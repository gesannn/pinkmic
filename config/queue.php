<?php
return ['default'=>env('QUEUE_CONNECTION','database'),'connections'=>['sync'=>['driver'=>'sync'],'database'=>['driver'=>'database','connection'=>env('DB_QUEUE_CONNECTION'),'table'=>'jobs','queue'=>env('DB_QUEUE','default'),'retry_after'=>90,'after_commit'=>false]]];
