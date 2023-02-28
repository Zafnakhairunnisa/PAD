@canany(['admin.cluster_2.child_birth.recapitulation.list',
    'admin.cluster_2.mother_and_daughter_card.recapitulation.list', 'admin.cluster_2.immunization.recapitulation.list',
    'admin.cluster_2.infant_mortality.recapitulation.list', 'admin.cluster_2.maternal_death.recapitulation.list',
    'admin.cluster_2.child_nutrition.recapitulation.list', 'admin.cluster_2.breast_feeding.list',
    'admin.cluster_2.medical_facility.list', 'admin.cluster_2.sanitation.recapitulation.list'])
    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.cluster_3.*'), 'c-open c-show') }}">
        <x-utils.link
            href="#"
            icon="c-sidebar-nav-icon cil-healing"
            class="c-sidebar-nav-dropdown-toggle"
            :text="__('Klaster 3')"
        />

        <ul class="c-sidebar-nav-dropdown-items">
            @can('admin.cluster_3.child_birth.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Persalinan')"
                        href="{{ route('admin.cluster_3.child_birth.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.child_birth.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.mother_and_daughter_card.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Kartu Ibu dan Anak')"
                        href="{{ route('admin.cluster_3.mother_and_daughter_card.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.mother_and_daughter_card.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.immunization.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Imunisasi')"
                        href="{{ route('admin.cluster_3.immunization.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.immunization.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.infant_mortality.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Angka Kematian Bayi')"
                        href="{{ route('admin.cluster_3.infant_mortality.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.infant_mortality.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.maternal_death.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Angka Kematian Ibu Melahirkan')"
                        href="{{ route('admin.cluster_3.maternal_death.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.maternal_death.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.child_nutrition.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Status Gizi Anak')"
                        href="{{ route('admin.cluster_3.child_nutrition.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.child_nutrition.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.breast_feeding.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Pemberian Air Susu Ibu')"
                        href="{{ route('admin.cluster_3.breast_feeding.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.breast_feeding.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.medical_facility.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Fasilitas Kesehatan Ramah Anak')"
                        href="{{ route('admin.cluster_3.medical_facility.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.medical_facility.*'), 'c-active')"
                    />
                </li>
            @endcan
            @can('admin.cluster_3.sanitation.recapitulation.list')
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-media-record"
                        class="c-sidebar-nav-link"
                        style="padding-left: 85px;"
                        :text="__('Air Bersih dan Sanitasi')"
                        href="{{ route('admin.cluster_3.sanitation.recapitulation.index') }}"
                        :active="activeClass(Route::is('admin.cluster_3.sanitation.*'), 'c-active')"
                    />
                </li>
            @endcan
        </ul>
    </li>
@endcanany
