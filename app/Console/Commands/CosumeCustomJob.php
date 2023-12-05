<?php

namespace App\Console\Commands;

use App\Models\Notification;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class CosumeCustomJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cosume-custom-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_USER'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST')
        );
        $channel = $connection->channel();

        $channel->queue_declare('default', false, true, false, false);

        $callback = function ($msg) {
            $data = json_decode($msg->body, true);

            //1 obsługa błędów try catch/
            // Circuit braker -> worker 5 razy padnie na jednej wiadomosci -> retry policy --> failover -> mejla ślij
            //2 ackk
            //3 logowanie -  monitoring
            //4 proces długotrwały - supervisor https://laravel.com/docs/10.x/queues#supervisor-configuration
            $notification = new Notification;
            $notification->type = $data['type'];
            $notification->body = $data['body'];
            $notification->save();

            dump($data);

            echo 'Received and processed message: ' . $msg->body . PHP_EOL;
            $msg->ack();
        };

        $channel->basic_consume('default', '', false, false, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
