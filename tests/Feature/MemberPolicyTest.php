<?php

use App\Models\Member;
use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->membershipUser = User::factory()->membership()->create();
    $this->electionUser = User::factory()->election()->create();
    $this->noRoleUser = User::factory()->create();
    $this->member = Member::factory()->active()->create();
});

describe('membership role permissions', function () {
    test('can view any members', function () {
        actingAs($this->membershipUser);

        expect($this->membershipUser->can('viewAny', Member::class))->toBeTrue();
    });

    test('can view a member', function () {
        actingAs($this->membershipUser);

        expect($this->membershipUser->can('view', $this->member))->toBeTrue();
    });

    test('can create members', function () {
        actingAs($this->membershipUser);

        expect($this->membershipUser->can('create', Member::class))->toBeTrue();
    });

    test('can update members', function () {
        actingAs($this->membershipUser);

        expect($this->membershipUser->can('update', $this->member))->toBeTrue();
    });

    test('can delete members', function () {
        actingAs($this->membershipUser);

        expect($this->membershipUser->can('delete', $this->member))->toBeTrue();
    });

    test('can export members', function () {
        actingAs($this->membershipUser);

        expect($this->membershipUser->can('export', Member::class))->toBeTrue();
    });
});

describe('election role permissions', function () {
    test('can view any members', function () {
        actingAs($this->electionUser);

        expect($this->electionUser->can('viewAny', Member::class))->toBeTrue();
    });

    test('can view a member', function () {
        actingAs($this->electionUser);

        expect($this->electionUser->can('view', $this->member))->toBeTrue();
    });

    test('cannot create members', function () {
        actingAs($this->electionUser);

        expect($this->electionUser->can('create', Member::class))->toBeFalse();
    });

    test('cannot update members', function () {
        actingAs($this->electionUser);

        expect($this->electionUser->can('update', $this->member))->toBeFalse();
    });

    test('cannot delete members', function () {
        actingAs($this->electionUser);

        expect($this->electionUser->can('delete', $this->member))->toBeFalse();
    });

    test('can export members', function () {
        actingAs($this->electionUser);

        expect($this->electionUser->can('export', Member::class))->toBeTrue();
    });
});

describe('no role permissions', function () {
    test('cannot view any members', function () {
        actingAs($this->noRoleUser);

        expect($this->noRoleUser->can('viewAny', Member::class))->toBeFalse();
    });

    test('cannot view a member', function () {
        actingAs($this->noRoleUser);

        expect($this->noRoleUser->can('view', $this->member))->toBeFalse();
    });

    test('cannot create members', function () {
        actingAs($this->noRoleUser);

        expect($this->noRoleUser->can('create', Member::class))->toBeFalse();
    });

    test('cannot update members', function () {
        actingAs($this->noRoleUser);

        expect($this->noRoleUser->can('update', $this->member))->toBeFalse();
    });

    test('cannot delete members', function () {
        actingAs($this->noRoleUser);

        expect($this->noRoleUser->can('delete', $this->member))->toBeFalse();
    });

    test('cannot export members', function () {
        actingAs($this->noRoleUser);

        expect($this->noRoleUser->can('export', Member::class))->toBeFalse();
    });
});
