<?php


namespace Alevel\Orders\Api\Model;


interface OrderInterface
{
    const TABLE_NAME                = 'level_quick_order';

    const ID_FIELD                  = 'order_id';
    const NAME_FIELD               = 'customer_name';
    const EMAIL_FIELD             = 'email';



    /**
     * @return mixed
     */
    public function getId();
    /**
     * @return mixed
     */
    public function getEmail();
    /**
     * @return mixed
     */
    public function getName();
}
