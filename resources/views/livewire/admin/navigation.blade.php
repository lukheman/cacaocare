<div>
    <x-sidebar-item :active="request()->routeIs('admin.dashboard')" :href="route('admin.dashboard')">Dashboard</x-sidebar-item>

    <li class="sidebar-title">Menu</li>
    <x-sidebar-item
        icon="fa-virus"
        :active="request()->routeIs('admin.penyakit.index')"
        :href="route('admin.penyakit.index')">
        Penyakit
    </x-sidebar-item>
    <x-sidebar-item
        icon="fa-notes-medical"
        :active="request()->routeIs('admin.gejala.index')"
        :href="route('admin.gejala.index')">
        Gejala
    </x-sidebar-item>
    <x-sidebar-item
        icon="fa-stethoscope"
        :active="request()->routeIs('admin.gejala-penyakit.*')"
        :href="route('admin.gejala-penyakit.index')">
        Gejala Penyakit (<i>Rule</i>)
    </x-sidebar-item>
    <x-sidebar-item
        icon="fa-heartbeat"
        :active="request()->routeIs('admin.diagnosis')"
        :href="route('admin.diagnosis')">
        Diagnosis
    </x-sidebar-item>

    <li class="sidebar-title">Laporan</li>
    <x-sidebar-item
        icon="fa-file-medical"
        :active="request()->routeIs('admin.laporan-diagnosis-pasien')"
        :href="route('admin.laporan-diagnosis-pasien')">
        Laporan Diagnosis Pasien
    </x-sidebar-item>

</div>
