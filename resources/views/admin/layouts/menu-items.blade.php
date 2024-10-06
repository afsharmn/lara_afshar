@php($route = 'admin.index')
<x-admin.menu-item href="{{ route($route) }}" icon="bi-house-door-fill" title="خانه" :active="\Illuminate\Support\Facades\Route::is($route)" />

<x-admin.menu-item href="#" icon="bi-collection" :title="__('public media')" />

{{--<x-admin.menu-item href="#" icon="bi-info-lg" title="اطلاعات" />--}}

{{--<x-admin.menu-item href="#" icon="bi-lightning" title="برق" />--}}

{{--<x-admin.menu-item-collapse icon="bi-magic" title="جادو" open>--}}

{{--    <x-admin.menu-item-collapse-inner href="#" title="هوا"/>--}}
{{--    <x-admin.menu-item-collapse-inner href="#" title="آب" />--}}
{{--    <x-admin.menu-item-collapse-inner href="#" title="آتش" active/>--}}

{{--</x-admin.menu-item-collapse>--}}

{{--<x-admin.menu-item-collapse icon="bi-magic" title="جادو" >--}}

{{--    <x-admin.menu-item-collapse-inner href="#" title="هوا"/>--}}
{{--    <x-admin.menu-item-collapse-inner href="#" title="آب" />--}}
{{--    <x-admin.menu-item-collapse-inner href="#" title="آتش" />--}}

{{--</x-admin.menu-item-collapse>--}}

{{--<x-admin.menu-item href="#" icon="bi-lightning" title="برق" />--}}
