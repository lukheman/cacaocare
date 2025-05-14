<div>
    <x-sidebar-item :active="request()->routeIs('pasien.dashboard')" :href="route('pasien.dashboard')">Dashboard</x-sidebar-item>

    <li class="sidebar-title">Menu</li>
    <x-sidebar-item
        icon="fa-heartbeat"
        :active="request()->routeIs('pasien.diagnosis')"
        :href="route('pasien.diagnosis')">
        Diagnosis
    </x-sidebar-item>

</div>
