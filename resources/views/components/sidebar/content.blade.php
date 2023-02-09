<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3 overflow-auto">

    <x-sidebar.link title="{{ __('Dashboard') }}" href="{{ route('admin.dashboard') }}" :isActive="request()->routeIs('admin.dashboard')">
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Sections') }}" href="{{ route('admin.sections.index') }}" :isActive="request()->routeIs('admin.sections.index')">
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Services') }}" href="{{ route('admin.services.index') }}" :isActive="request()->routeIs('admin.services.index')">
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Partners') }}" href="{{ route('admin.partners.index') }}" :isActive="request()->routeIs('admin.partners.index')">
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('About') }}" href="{{ route('admin.about.index') }}" :isActive="request()->routeIs('admin.about.index')">
    </x-sidebar.link>
    
    {{-- TODO -->> @if ($blog_active =! true) --}}
    <x-sidebar.link title="{{ __('Blogs') }}" href="{{ route('admin.blogs.index') }}" :isActive="request()->routeIs('admin.blogs.index')">
    </x-sidebar.link>
    
    <x-sidebar.link title="{{ __('Blog Categories') }}" href="{{ route('admin.bcategories.index') }}" :isActive="request()->routeIs('admin.bcategories.index')">
    </x-sidebar.link>

    {{-- @endif --}}

    <x-sidebar.link title="{{ __('Users') }}" href="{{ route('admin.users.index') }}" :isActive="request()->routeIs('admin.users.index')">
    </x-sidebar.link>
   
    <x-sidebar.link title="{{ __('Contact') }}" href="{{ route('admin.contact') }}" :isActive="request()->routeIs('admin.contact')">
    </x-sidebar.link>
    
    <x-sidebar.dropdown title="{{ __('Settings') }}" :active="Str::startsWith(request()->route()->uri(), 'Settings')">
        <x-sidebar.sublink title="{{ __('Permission') }}" href="{{ route('admin.permissions.index') }}"
            :active="request()->routeIs('admin.permissions.index')" />
        <x-sidebar.sublink title="{{ __('Roles') }}" href="{{ route('admin.roles.index') }}"
            :active="request()->routeIs('admin.roles.index')" />
        
         <x-sidebar.sublink title="{{ __('General Settings') }}" href="{{ route('admin.settings.index') }}"
        :active="request()->routeIs('admin.settings.index')" /> 

        <x-sidebar.sublink title="{{ __('Languages') }}" href="{{ route('admin.language.index') }}"
        :active="request()->routeIs('admin.language.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="{{ __('Logout') }}" onclick="event.preventDefault(); 
                    document.getElementById('logoutform').submit();" href="#">
    </x-sidebar.link>
    
       
</x-perfect-scrollbar>