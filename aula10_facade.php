<?php
/**
 *  Quando existem classes e objetos para cada parte do sistema.
 *  Ex: site de compras. Finalizacao de uma compra
 */
class Purchase
{
    private $order; // Um subsistema
    private $billing; // Um subsistema
    private $shipping; // Um subsistema
    
    public function __construct(OrderInterface $order,
            BillingInterface $billing,ShippingInterface $shipping)
    {
        $this->order = $order;
        $this->billing = $billing;
        $this->shipping = $shipping;
    }
    
    public function finish()
    {
        $this->billing->chargeCreditCard();
        $this->order->setStatus($this->billing->getStatus());
        
        if ($this->order->isOk()) {
            $this->shipping->addToPipeline($this->order);
        }
    }
}

$purchase = new Purchase($order, $billing, $shipping);
$purchas->finish();
?>