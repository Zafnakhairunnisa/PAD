@canany(['admin.cluster_4.education.recapitulation.list', 'admin.cluster_4.scholl.recapitulation.list',
    'admin.cluster_4.pusat_kreatifitas_anak.recapitulation.list',
    'admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.list'])
    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.cluster_4.*'), 'c-open c-show') }}">
        <x-utils.link
            href="#"
            icon="c-sidebar-nav-icon cil-book"
            class="c-sidebar-nav-dropdown-toggle"
            :text="__('Klaster 4')"
        />

        <ul class="c-sidebar-nav-dropdown-items">
            @can('admin.cluster_4.education.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pendidikan')"
                        href="{{ route('admin.cluster_4.education.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_4.education.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_4.scholl.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Sekolah/Madrasah Ramah Anak')"
                    />
                </li>
            @endcan

            @can('admin.cluster_4.pusat_kreatifitas_anak.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pusat Kreatifitas Anak')"
                        href="{{ route('admin.cluster_4.pusat_kreatifitas_anak.index') }}"
                        :active="activeClass(Route::is('admin.cluster_4.pusat_kreatifitas_anak.*'), 'c-active')"
                    />
                </li>
            @endcan

            @can('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Rumah Ibadah Ramah Anak')"
                        href="{{ route('admin.cluster_4.rumah_ibadah_ramah_anak.index') }}"
                        :active="activeClass(Route::is('admin.cluster_4.rumah_ibadah_ramah_anak.*'), 'c-active')"
                    />
                </li>
            @endcan
        </ul>
    </li>
@endcanany
