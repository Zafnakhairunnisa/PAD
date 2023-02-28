@canany(['admin.institutional.child_care_organization.recapitulation.list'])
    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.institutional.*'), 'c-open c-show') }}">
        <x-utils.link
            href="#"
            icon="c-sidebar-nav-icon cil-institution"
            class="c-sidebar-nav-dropdown-toggle"
            :text="__('Kelembagaan')"
        />

        <ul class="c-sidebar-nav-dropdown-items">
            @can('admin.institutional.child_protection_index.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        style="padding-left: 85px;"
                        class="c-sidebar-nav-link "
                        :text="__('Indeks Perlindungan Anak')"
                        :href="route('admin.institutional.child_protection_index.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.child_protection_index.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.regulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Peraturan dan Kebijakan')"
                        :href="route('admin.institutional.regulation.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.regulation.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.child_protection_activities.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kegiatan Perlindungan Anak')"
                        :href="route('admin.institutional.child_protection_activity.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.child_protection_activity.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.satgas_ppa.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Satgas PPA')"
                        :href="route('admin.institutional.satgas_ppa.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.satgas_ppa.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.child_forum.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Forum Anak')"
                        :href="route('admin.institutional.child_forum.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.child_forum.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.child_care_org.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Organisasi Peduli Anak')"
                        :href="route('admin.institutional.child_care_organization.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.child_care_organization.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.child_media.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Media Massa Sahabat Anak')"
                        :href="route('admin.institutional.child_media.index')"
                        :active="activeClass(
                            Route::is('admin.institutional.child_media.*'),
                            'c-active',
                        )"
                    />
                </li>
            @endcan
            @can('admin.institutional.kelurahan.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kalurahan/Kelurahan Layak Anak')"
                        href="{{ route('admin.institutional.kelurahan.index') }}"
                        :active="activeClass(Route::is('admin.institutional.kelurahan.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.institutional.kapanewon.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kapanewon/Kemantrean Layak Anak')"
                        href="{{ route('admin.institutional.kapanewon.index') }}"
                        :active="activeClass(Route::is('admin.institutional.kapanewon.*'), 'c-active')"
                    />
                </li>
            @endcan
        </ul>
    </li>
@endcanany
