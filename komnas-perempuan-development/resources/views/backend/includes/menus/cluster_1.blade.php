@canany(['admin.cluster_1.birth_certificate.list', 'admin.cluster_1.child_identity_card.list',
    'admin.cluster_1.pusat_informasi_sahabat.list'])
    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.cluster_1.*'), 'c-open c-show') }}">
        <x-utils.link
            href="#"
            icon="c-sidebar-nav-icon cil-balance-scale"
            class="c-sidebar-nav-dropdown-toggle"
            :text="__('Klaster 1')"
        />

        <ul class="c-sidebar-nav-dropdown-items">
            @can('admin.cluster_1.birth_certificate.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ route('admin.cluster_1.birth_certificate.index') }}"
                        icon="c-sidebar-nav-icon cil-media-record"
                        style="padding-left: 85px;"
                        class="c-sidebar-nav-link"
                        :text="__('Akta Kelahiran')"
                        :active="activeClass(Route::is('admin.cluster_1.birth_certificate.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_1.child_identity_card.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kartu Identitas Anak')"
                        href="{{ route('admin.cluster_1.child_identity_card.index') }}"
                        :active="activeClass(Route::is('admin.cluster_1.child_identity_card.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_1.library.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pusat Informasi Sahabat Anak')"
                        href="{{ route('admin.cluster_1.library.index') }}"
                        :active="activeClass(Route::is('admin.cluster_1.library.*'), 'c-active')"
                    />
                </li>
            @endcan
        </ul>
    </li>
@endcanany
