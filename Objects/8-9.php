<?php

class SavingsAccount{
    private string $name;
    private int $balance;
    private int $interestRate;

    public function init(){
        $this->balance =  readline("How much money is in the account?: " . PHP_EOL);
        $this->interestRate =  readline("Enter the annual interest rate: ". PHP_EOL);
        $n = readline("How long has the account been opened? ". PHP_EOL);

        $totalDeposit = 0;
        $totalWithdrawn = 0;
        $totalInterest = 0;
        for($i = 1; $i <= $n; $i++){
            $deposit =(int)readline("Enter amount deposited for month ".$i. ": ". PHP_EOL);
            $totalDeposit += $deposit;
            $this->deposit($deposit);
            $withdraw =(int)readline("Enter amount withdrawn for month ".$i. ": ". PHP_EOL);
            $totalWithdrawn += $withdraw;
            $this->withdraw($withdraw);
            $totalInterest += $this->monthlyInterest();

        }
        echo "Total deposited: $" . number_format($totalDeposit,2) . PHP_EOL;
        echo "Total withdrawn: $" . number_format($totalWithdrawn,2) . PHP_EOL;
        echo "Interest earned: $" . number_format($totalInterest,2) . PHP_EOL;
        echo "Ending balance : $" . number_format($this->balance,2) . PHP_EOL;

    }

    public function __construct(string $name, int $balance)
    {
        $this->name =$name;
        $this->balance = $balance;
    }
    public function withdraw(int $amount){
        $this->balance -= $amount;
    }
    public function deposit(int $amount){
        $this->balance += $amount;
    }

    public function monthlyInterest(){
        $this->balance += ($this->interestRate/12) * $this->balance;
        return $this->interestRate/12*$this->balance;
    }
    public function show_user_name_and_balance():string {
        return $this->name . ", $" . number_format($this->balance,2) . PHP_EOL;
    }
}

$ben = new SavingsAccount("Benson",10000);
$ben->init();
echo $ben->show_user_name_and_balance();