<?php

namespace PhpAmqpLib\Exception;

class AMQPProtocolException extends \Exception implements AMQPExceptionInterface
{
    /** @var string */
    public $amqp_reply_code;

    /** @var int */
    public $amqp_reply_text;

    /** @var int[] */
    public $amqp_method_sig;

    /** @var array */
    public $args;

    /**
     * @param string $reply_code
     * @param int $reply_text
     * @param array $method_sig
     */
    public function __construct($reply_code, $reply_text, $method_sig)
    {
        parent::__construct($reply_text, $reply_code);

        $this->amqp_reply_code = $reply_code; // redundant, but kept for BC
        $this->amqp_reply_text = $reply_text; // redundant, but kept for BC
        $this->amqp_method_sig = $method_sig;

        $this->args = array($reply_code, $reply_text, $method_sig);
    }
}
