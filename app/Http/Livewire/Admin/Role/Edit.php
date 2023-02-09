<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Edit extends Component
{
    use LivewireAlert;
    public Role $role;

    public array $permissions = [];

    public array $listsForFields = [];
   
    protected $listeners = [
        'submit',
    ];

    public function mount(Role $role)
    {
        $this->role        = $role;
        $this->permissions = $this->role->permissions->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.role.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->role->save();
        $this->role->permissions()->sync($this->permissions);

        // $this->alert('success', __('Role updated successfully!') );

        return redirect()->route('admin.roles.index');
    }

    protected function rules(): array
    {
        return [
            'role.title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['permissions'] = Permission::pluck('title', 'id')->toArray();
    }
}
