<?php

class Account{
    private string $name;
    private int $balance;
    private int $interestRate;

    /**
     * @return int
     */
    public function balance(): int
    {
        return $this->balance;
    }


    public function __construct(string $name, int $balance)
    {
        $this->name =$name;
        $this->balance = $balance;
    }
    public function withdrawal(int $amount){
        $this->balance -= $amount;
    }
    public function deposit(int $amount){
        $this->balance += $amount;
    }

    public static function transfer(Account $from, Account $to, int $howMuch){
        if($from->balance >= $howMuch){
            $from->withdrawal($howMuch);
            $to->deposit($howMuch);
        }else echo "Not enough funds!". PHP_EOL;

    }
    public function show_user_name_and_balance():string {
        return $this->name . ", $" . number_format($this->balance,2) . PHP_EOL;
    }
}

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" .PHP_EOL;
echo $bartos_account->show_user_name_and_balance();
echo $bartos_swiss_account->show_user_name_and_balance();

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->balance() . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartos_account->show_user_name_and_balance() . PHP_EOL;
echo $bartos_swiss_account->show_user_name_and_balance() . PHP_EOL;


$mattsAccount = new Account("Matt's account", 1000);
$myAccount = new Account("My account", 0);
$mattsAccount->withdrawal(100);
$myAccount->deposit(100);
echo $myAccount->show_user_name_and_balance();
echo $mattsAccount->show_user_name_and_balance();


$A = new Account("A",100);
$B = new Account("B",0);
$C = new Account("C",0);

Account::transfer($A,$B,50);
Account::transfer($B,$C,25);

echo $A->balance() . PHP_EOL;
echo $B->balance() . PHP_EOL;
echo $C->balance() . PHP_EOL;