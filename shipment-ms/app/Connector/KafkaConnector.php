<?php
namespace App\Connector;

use App\Queues\KafkaQueue;
use Illuminate\Queue\Connectors\ConnectorInterface;

class KafkaConnector implements ConnectorInterface
{
    public function connect(array $config)
    {
        $conf = new \RdKafka\Conf();

        $conf->set('bootstrap.servers', $config['bootstrap_servers']);
       
        //$conf->set('security.protocol', $config['security_protocol']);
        //$conf->setMetadataBrokerList('127.0.0.1:9092');
        //$conf->set('sasl.mechanisms', $config['sasl_mechanisms']);
        //$conf->set('sasl.username', $config['sasl_username']);
        //$conf->set('sasl.password', $config['sasl_password']);

        $producer = new \RdKafka\Producer($conf);

        $conf->set('group.id', $config['group_id']);
        $conf->set('auto.offset.reset', 'earliest');

        $consumer = new \RdKafka\KafkaConsumer($conf);

        return new KafkaQueue($producer, $consumer);
    }
}