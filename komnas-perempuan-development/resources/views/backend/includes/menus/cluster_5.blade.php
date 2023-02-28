@canany(['admin.cluster_5.kekerasan_terhadap_anak.recapitulation.list',
    'admin.cluster_5.perlindungan_khusus_anak.recapitulation.list',
    'admin.cluster_5.anak_berhadapan_hukum.recapitulation.list',
    'admin.cluster_5.anak_korban_terorisme.recapitulation.list', 'admin.cluster_5.anak_aids.recapitulation.list',
    'admin.cluster_5.pekerja_anak.recapitulation.list', 'admin.cluster_5.bprs.recapitulation.list'])
    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.cluster_5.*'), 'c-open c-show') }}">
        <x-utils.link
            href="#"
            icon="c-sidebar-nav-icon cil-baby-carriage"
            class="c-sidebar-nav-dropdown-toggle"
            :text="__('Klaster 5')"
        />

        <ul class="c-sidebar-nav-dropdown-items">
            @can('admin.cluster_5.patbm.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Perlindungan Terhadap Anak Berbasis Masyarakat')"
                        href="{{ route('admin.cluster_5.patbm.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.patbm.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kekerasan Terhadap Anak')"
                        href="{{ route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.kekerasan_terhadap_anak.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.perlindungan_khusus_anak.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Anak Memerlukan Perlindungan Khusus')"
                        href="{{ route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.perlindungan_khusus_anak.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.anak_berhadapan_hukum.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Anak Berhadapan dengan Hukum')"
                        href="{{ route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.anak_berhadapan_hukum.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.anak_korban_terorisme.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Anak Korban Terorisme dan Radikalisme')"
                        href="{{ route('admin.cluster_5.anak_korban_terorisme.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.anak_korban_terorisme.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.anak_aids.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('AIDS')"
                        href="{{ route('admin.cluster_5.anak_aids.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.anak_aids.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.pekerja_anak.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pekerja Anak')"
                        href="{{ route('admin.cluster_5.pekerja_anak.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.pekerja_anak.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.bprs.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('BPRS')"
                        href="{{ route('admin.cluster_5.bprs.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.bprs.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.lpka.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('LPKA')"
                        href="{{ route('admin.cluster_5.lpka.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.lpka.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.polisi_diy.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Polisi DIY')"
                        href="{{ route('admin.cluster_5.polisi_diy.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.polisi_diy.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.kejaksaan.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kejaksaan')"
                        href="{{ route('admin.cluster_5.kejaksaan.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.kejaksaan.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_5.pengadilan.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pengadilan')"
                        href="{{ route('admin.cluster_5.pengadilan.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.pengadilan.*'), 'c-active')"
                    />
                </li>
            @endcan

            @can('admin.cluster_5.bapas.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Balai Pemasyarakatan')"
                        href="{{ route('admin.cluster_5.bapas.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.bapas.*'), 'c-active')"
                    />
                </li>
            @endcan

            @can('admin.cluster_5.peksos.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pekerja Sosial')"
                        href="{{ route('admin.cluster_5.peksos.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_5.peksos.recapitulation.*'), 'c-active')"
                    />
                </li>
            @endcan


        </ul>
    </li>
@endcanany
