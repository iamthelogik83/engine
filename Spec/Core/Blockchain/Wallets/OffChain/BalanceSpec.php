<?php

namespace Spec\Minds\Core\Blockchain\Wallets\OffChain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Minds\Entities\User;
use Minds\Core\Blockchain\Wallets\OffChain\Sums;

class BalanceSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Minds\Core\Blockchain\Wallets\OffChain\Balance');
    }

    function it_should_return_the_balance(Sums $sums)
    {
        $this->beConstructedWith($sums);

        $user = new User;
        $user->guid = 123;

        $sums->setUser($user)
            ->shouldBeCalled()
            ->willReturn($sums);
        $sums->getBalance()
            ->shouldBeCalled()
            ->willReturn(50);

        $this->setUser($user);
        $this->get()->shouldReturn((double) 50);
    }


}