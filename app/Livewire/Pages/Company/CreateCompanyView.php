<?php

namespace App\Livewire\Pages\Company;

use App\Models\Company;
use App\ResourcesTrait;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCompanyView extends Component
{
    use ResourcesTrait;
    public $title = "Create Company";
    public $hash = null;
    #[Validate([
        'name' => 'required',
        'maxUser' => 'numeric|min:0',
        'isSubscribed' => 'required',
    ])]
    public $name;
    public $maxUser;
    public $isSubscribed;

    public function mount($hash = null)
    {
        if ($hash != null) {
            $this->hash = $hash;
            $companyData = Company::where('hash', $hash)->first();
            $this->name = $companyData->name;
            $this->maxUser = $companyData->max_user;
            $this->isSubscribed = $companyData->is_subscribed;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        $subscribedData = collect([
            (object) ['id' => 0, 'name' => 'no'],
            (object) ['id' => 1, 'name' => 'yes'],
        ]);

        return view('livewire.pages.company.create-company-view', compact('subscribedData'));
    }

    public function update()
    {
        $this->validate();

        $this->updateResource(
            Company::class,
            [
                'name' => $this->name,
                'max_user' => $this->maxUser,
                'is_subscribed' => $this->isSubscribed,
            ]
        );

        return $this->redirectRoute('company.index', navigate: true);
    }

    public function store()
    {
        $this->validate();

        $this->storeResource(
            Company::class,
            [
                'name' => $this->name,
                'max_user' => $this->maxUser,
                'is_subscribed' => $this->isSubscribed,
            ]
        );

        return $this->redirectRoute('company.index', navigate: true);
    }

    public function updateSubscription()
    {
        $this->updateResource(
            Company::class,
            [
                'subscribed_at' => Carbon::now(),
                'expired_at' => Carbon::now()->addMonths(6),
                'is_subscribed' => 1,
            ]
        );

        return $this->redirectRoute('company.index', navigate: true);
    }
}
