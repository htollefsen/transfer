<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Event;

use Symfony\Component\EventDispatcher\Event;
use Transfer\Worker\WorkerInterface;

/**
 * Event triggered after a object is passed through a worker.
 */
class PostWorkerEvent extends Event
{
    /**
     * @var WorkerInterface Worker
     */
    protected $worker;

    /**
     * @var mixed Object received from worker
     */
    protected $object;

    /**
     * @var float Elapsed time
     */
    protected $elapsedTime;

    /**
     * @param WorkerInterface $worker      Worker
     * @param mixed           $object      Object received from worker
     * @param float           $elapsedTime Elapsed time
     */
    public function __construct(WorkerInterface $worker, $object, $elapsedTime = 0.0)
    {
        $this->worker = $worker;
        $this->object = $object;
        $this->elapsedTime = $elapsedTime;
    }

    /**
     * Returns worker.
     *
     * @return WorkerInterface
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     * Returns object which was received from worker.
     *
     * @return mixed Object sent to worker
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Returns elapsed time.
     *
     * @return float Elapsed time
     */
    public function getElapsedTime()
    {
        return $this->elapsedTime;
    }
}
