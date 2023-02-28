<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Domains\Announcement\Models{
/**
 * Class Announcement.
 *
 * @property int $id
 * @property string|null $area
 * @property string $type
 * @property string $message
 * @property bool $enabled
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement enabled()
 * @method static \Database\Factories\AnnouncementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement forArea($area)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement inTimeFrame()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Announcement extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class PasswordHistory.
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class Permission.
 *
 * @property int $id
 * @property string $type
 * @property string $guard_name
 * @property string $name
 * @property string|null $description
 * @property int|null $parent_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $children
 * @property-read int|null $children_count
 * @property-read Permission|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission isChild()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission isMaster()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission isParent()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission singular()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class Role.
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $permissions_label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class User.
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property \Illuminate\Support\Carbon|null $password_changed_at
 * @property bool $active
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property bool $to_be_logged_out
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $avatar
 * @property-read string $permissions_label
 * @property-read string $roles_label
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\PasswordHistory[] $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \DarkGhostHunter\Laraguard\Eloquent\TwoFactorAuthentication $twoFactorAuth
 * @method static \Illuminate\Database\Eloquent\Builder|User admins()
 * @method static \Illuminate\Database\Eloquent\Builder|User allAccess()
 * @method static \Illuminate\Database\Eloquent\Builder|User byType($type)
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyActive()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyDeactivated()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|User users()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToBeLoggedOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable {}
}

namespace App\Domains\Cluster1\Models{
/**
 * App\Domains\Cluster1\Models\BirthCertificate
 *
 * @property int $id
 * @property string $category
 * @property string $year
 * @property string $gender
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster1\BirthCertificate\BirthCertificateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BirthCertificate whereYear($value)
 */
	class BirthCertificate extends \Eloquent {}
}

namespace App\Domains\Cluster1\Models{
/**
 * App\Domains\Cluster1\Models\ChildIdentityCard
 *
 * @property int $id
 * @property string $category
 * @property string $year
 * @property string $gender
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster1\ChildIdentityCard\ChildIdentityCardFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildIdentityCard whereYear($value)
 */
	class ChildIdentityCard extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\ChildFriendlyPlayroom{
/**
 * App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroom
 *
 * @property int $id
 * @property string $slug
 * @property string $nama
 * @property string $alamat
 * @property string $kalurahan
 * @property string $kapanewon
 * @property int|null $location_id
 * @property string $sertifikasi
 * @property string $jenis
 * @property string $fasilitas
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategory|null $category
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereFasilitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereSertifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroom whereUpdatedBy($value)
 */
	class ChildFriendlyPlayroom extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\ChildFriendlyPlayroom{
/**
 * App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User $creator
 * @property-read \App\Domains\Auth\Models\User $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomCategory whereUpdatedAt($value)
 */
	class ChildFriendlyPlayroomCategory extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\ChildFriendlyPlayroom{
/**
 * App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulation
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $year
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategory|null $category
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildFriendlyPlayroomRecapitulation whereYear($value)
 */
	class ChildFriendlyPlayroomRecapitulation extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution{
/**
 * App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution
 *
 * @property int $id
 * @property string $slug
 * @property string $nama
 * @property int|null $jenis_id
 * @property string $tahun_berdiri
 * @property string $legalitas
 * @property string $akreditasi
 * @property string $dusun
 * @property string $kalurahan
 * @property string $kapanewon
 * @property int|null $location_id
 * @property string $media_sosial
 * @property string $nama_pimpinan
 * @property string $no_telepon
 * @property string $jumlah_anak_asuh
 * @property string $fasilitas
 * @property string $kegiatan
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereAkreditasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereDusun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereFasilitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereJumlahAnakAsuh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereLegalitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereMediaSosial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereNamaPimpinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereTahunBerdiri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitution whereUpdatedBy($value)
 */
	class ChildWelfareInstitution extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution{
/**
 * App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User $creator
 * @property-read \App\Domains\Auth\Models\User $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionCategory whereUpdatedAt($value)
 */
	class ChildWelfareInstitutionCategory extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution{
/**
 * App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulation
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $year
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationCategory|null $category
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildWelfareInstitutionRecapitulation whereYear($value)
 */
	class ChildWelfareInstitutionRecapitulation extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models{
/**
 * App\Domains\Cluster2\Models\FamilyConsultancyRecapitulation
 *
 * @property int $id
 * @property string $category
 * @property string $year
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\FamilyConsultancy\FamilyConsultancyRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancyRecapitulation whereYear($value)
 */
	class FamilyConsultancyRecapitulation extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\FamilyConsultancy{
/**
 * App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy
 *
 * @property int $id
 * @property string $nama
 * @property string $slug
 * @property int|null $kategori_id
 * @property string $alamat
 * @property string $kalurahan
 * @property string $kapanewon
 * @property int|null $location_id
 * @property string $media_sosial
 * @property string $nama_pimpinan
 * @property string $no_telepon
 * @property string $no_sertifikasi
 * @property string $kegiatan
 * @property string $klien
 * @property string $fasilitas
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancyCategory|null $category
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\FamilyConsultancy\FamilyConsultancyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy query()
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereFasilitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereKlien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereMediaSosial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereNamaPimpinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereNoSertifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FamilyConsultancy whereUpdatedBy($value)
 */
	class FamilyConsultancy extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\PaudHi{
/**
 * App\Domains\Cluster2\Models\PaudHi\PaudHiCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User $creator
 * @property-read \App\Models\Location $location
 * @property-read \App\Domains\Auth\Models\User $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\PaudHi\PaudHiCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiCategory whereUpdatedAt($value)
 */
	class PaudHiCategory extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models\PaudHi{
/**
 * App\Domains\Cluster2\Models\PaudHi\PaudHiRecapitulation
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $year
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Cluster2\Models\PaudHi\PaudHiCategory|null $category
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\PaudHi\PaudHiRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaudHiRecapitulation whereYear($value)
 */
	class PaudHiRecapitulation extends \Eloquent {}
}

namespace App\Domains\Cluster2\Models{
/**
 * App\Domains\Cluster2\Models\PerkawinanAnak
 *
 * @property int $id
 * @property string $category
 * @property string $year
 * @property string $gender
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\Cluster2\PerkawinanAnak\PerkawinanAnakFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak query()
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerkawinanAnak whereYear($value)
 */
	class PerkawinanAnak extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildCareOrganization
 *
 * @property int $id
 * @property string $nama
 * @property int|null $location_id
 * @property string $alamat
 * @property string $kalurahan
 * @property string $kapanewon
 * @property string $kabupaten
 * @property string $media_sosial
 * @property string $nomor_telepon
 * @property string $nama_pimpinan
 * @property string $kegiatan
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildCareOrganization\ChildCareOrganizationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereMediaSosial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereNamaPimpinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereNomorTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganization whereUpdatedBy($value)
 */
	class ChildCareOrganization extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildCareOrganizationRecapitulation
 *
 * @property int $id
 * @property string $value
 * @property int|null $location_id
 * @property string $year
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildCareOrganization\ChildCareOrganizationRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildCareOrganizationRecapitulation whereYear($value)
 */
	class ChildCareOrganizationRecapitulation extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildForum
 *
 * @property int $id
 * @property string $nama
 * @property string $tingkat
 * @property string $surat_keputusan
 * @property string $waktu_pembentukan
 * @property string $nama_ketua
 * @property string $nomor_telepon
 * @property string $alamat
 * @property string $kalurahan
 * @property string $kapanewon
 * @property string $kabupaten
 * @property string $media_sosial
 * @property string $pelatihan_kha
 * @property string $partisipasi_musrenbang
 * @property string $kegiatan
 * @property string $prestasi
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildForum\ChildForumFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereMediaSosial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereNamaKetua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereNomorTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum wherePartisipasiMusrenbang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum wherePelatihanKha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum wherePrestasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereSuratKeputusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereTingkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForum whereWaktuPembentukan($value)
 */
	class ChildForum extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildForumRecapitulation
 *
 * @property int $id
 * @property string $value_diy
 * @property string $value_kabupaten
 * @property string $value_kapanewon
 * @property string $value_kalurahan
 * @property string $year
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildForum\ChildForumRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereValueDiy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereValueKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereValueKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereValueKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildForumRecapitulation whereYear($value)
 */
	class ChildForumRecapitulation extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildMedia
 *
 * @property int $id
 * @property string $nama
 * @property int|null $jenis_media_id
 * @property string $alamat
 * @property string $kalurahan
 * @property string $kapanewon
 * @property string $kabupaten
 * @property string $media_sosial
 * @property string $nomor_telepon
 * @property string $nama_pimpinan
 * @property string $nama_acara
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\MediaType|null $mediaType
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildMedia\ChildMediaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereJenisMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereMediaSosial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereNamaAcara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereNamaPimpinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereNomorTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMedia whereUpdatedBy($value)
 */
	class ChildMedia extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildMediaRecapitulation
 *
 * @property int $id
 * @property string $value
 * @property int|null $location_id
 * @property string $year
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildMedia\ChildMediaRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMediaRecapitulation whereYear($value)
 */
	class ChildMediaRecapitulation extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildProtectionActivity
 *
 * @property int $id
 * @property string $company_name
 * @property int|null $source_of_fund_id
 * @property int|null $activity_type_id
 * @property string $activity_name
 * @property string $target
 * @property string $budget
 * @property string $year
 * @property int|null $location_id
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Institutional\Models\ChildProtectionActivityType|null $activity_type
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $images
 * @property-read int|null $images_count
 * @property-read Location|null $location
 * @property-read \App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds|null $source_of_fund
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionActivity\ChildProtectionActivityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereActivityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereActivityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereSourceOfFundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereYear($value)
 * @mixin \Eloquent
 */
	class ChildProtectionActivity extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations
 *
 * @property int $id
 * @property string $company_count
 * @property string|null $source_of_fund_apbd
 * @property string|null $source_of_fund_csr
 * @property string $budget_amount
 * @property string $year
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionActivity\ChildProtectionActivityRecapitulationsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereBudgetAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereCompanyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereSourceOfFundApbd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereSourceOfFundCsr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityRecapitulations whereYear($value)
 */
	class ChildProtectionActivityRecapitulations extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionActivitySourceOfFundsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ChildProtectionActivitySourceOfFunds extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildProtectionActivityType
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionActivity\ChildProtectionActivityTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class ChildProtectionActivityType extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\ChildProtectionIndex
 *
 * @property int $id
 * @property string $category
 * @property string $year
 * @property string $value
 * @property string $rank
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionIndexFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereYear($value)
 * @mixin \Eloquent
 */
	class ChildProtectionIndex extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\Regulation
 *
 * @property int $id
 * @property string $name
 * @property string $year
 * @property string $rule_type
 * @property string $type
 * @property int|null $location_id
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $images
 * @property-read int|null $images_count
 * @property-read Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\RegulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereRuleType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereYear($value)
 * @mixin \Eloquent
 */
	class Regulation extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\RegulationRecapitulation
 *
 * @property int $id
 * @property string $year
 * @property string $category
 * @property string $value
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\RegulationRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereYear($value)
 * @mixin \Eloquent
 */
	class RegulationRecapitulation extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\SatgasPPA
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $level
 * @property string $kelurahan
 * @property string $kemantren
 * @property string $kabupaten
 * @property string $nomor
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\SatgasPPA\SatgasPPAFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA query()
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereKelurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereKemantren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPA whereUpdatedBy($value)
 */
	class SatgasPPA extends \Eloquent {}
}

namespace App\Domains\Institutional\Models{
/**
 * App\Domains\Institutional\Models\SatgasPPARecapitulation
 *
 * @property int $id
 * @property string $value_diy
 * @property string $value_kabupaten
 * @property string $value_kapanewon
 * @property string $value_kalurahan
 * @property string $year
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\SatgasPPA\SatgasPPARecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereValueDiy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereValueKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereValueKalurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereValueKapanewon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatgasPPARecapitulation whereYear($value)
 */
	class SatgasPPARecapitulation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string $mime
 * @property string $size
 * @property string $path
 * @property string $category
 * @property int $fileable_id
 * @property string $fileable_type
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read Model|\Eloquent $fileable
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|File createdBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LocationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MediaType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MediaTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaType whereUpdatedAt($value)
 */
	class MediaType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User $creator
 * @property-read \App\Domains\Auth\Models\User $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @mixin \Eloquent
 */
	class Model extends \Eloquent {}
}

