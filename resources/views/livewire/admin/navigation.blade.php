<div>
    <x-sidebar-item :active="request()->routeIs('admin.penyakit.index')" :href="route('admin.penyakit.index')">Penyakit</x-sidebar-item>
    <x-sidebar-item :active="request()->routeIs('admin.gejala.index')" :href="route('admin.gejala.index')">Gejala</x-sidebar-item>
    <x-sidebar-item :active="request()->routeIs('admin.gejala-penyakit.*')" :href="route('admin.gejala-penyakit.index')">Gejala Penyakit (<i>Rule</i>)</x-sidebar-item>
    <!-- <x-sidebar-item :active="request()->routeIs('admin.rule.*')" :href="route('admin.rule.index')">Rules</x-sidebar-item> -->
    <x-sidebar-item :active="request()->routeIs('admin.diagnosis')" :href="route('admin.diagnosis')">Diagnosis</x-sidebar-item>
    <x-sidebar-item :href="route('logout')">Logut</x-sidebar-item>
</div>
