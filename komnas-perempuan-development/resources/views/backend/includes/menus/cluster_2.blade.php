@canany(['admin.cluster_2.perkawinan_anak.list', 'admin.cluster_2.family_consultancy.list',
    'admin.cluster_2.paud_hi.recapitulation.list', 'admin.cluster_2.child_friendly_playroom.list',
    'admin.cluster_2.child_welfare_institution.list'])
    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.cluster_2.*'), 'c-open c-show') }}">
        <x-utils.link
            href="#"
            icon="c-sidebar-nav-icon cil-baby"
            class="c-sidebar-nav-dropdown-toggle"
            :text="__('Klaster 2')"
        />

        <ul class="c-sidebar-nav-dropdown-items">
            @can('admin.cluster_2.perkawinan_anak.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Perkawinan Anak')"
                        href="{{ route('admin.cluster_2.perkawinan_anak.index') }}"
                        :active="activeClass(Route::is('admin.cluster_2.perkawinan_anak.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_2.family_consultancy.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Lembaga Konsultasi Keluarga')"
                        href="{{ route('admin.cluster_2.family_consultancy.index') }}"
                        :active="activeClass(Route::is('admin.cluster_2.family_consultancy.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_2.paud_hi.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('PAUD HI')"
                        href="{{ route('admin.cluster_2.paud_hi.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_2.paud_hi.recapitulation.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_2.child_friendly_playroom.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Ruang Bermain Ramah Anak')"
                        href="{{ route('admin.cluster_2.child_friendly_playroom.index') }}"
                        :active="activeClass(Route::is('admin.cluster_2.child_friendly_playroom.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_2.child_welfare_institution.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Lembaga Kesejahteraan Sosial Anak')"
                        href="{{ route('admin.cluster_2.child_welfare_institution.index') }}"
                        :active="activeClass(Route::is('admin.cluster_2.child_welfare_institution.*'), 'c-active')"
                    />
                </li>
            @endcan
        </ul>
    </li>
@endcanany
