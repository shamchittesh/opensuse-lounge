<?php

declare(strict_types=1);

use App\Enums\Enums\MemberStatus;
use App\Models\Member;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $this->membershipUser = User::factory()->membership()->create();
    $this->electionUser = User::factory()->election()->create();
    $this->noRoleUser = User::factory()->create();
    $this->member = Member::factory()->active()->create();
});

describe('index action', function () {
    test('membership user can view members index', function () {
        actingAs($this->membershipUser);

        get(route('members.index'))
            ->assertStatus(200)
            ->assertViewIs('members.index')
            ->assertViewHas('members');
    });

    test('election user can view members index', function () {
        actingAs($this->electionUser);

        get(route('members.index'))
            ->assertStatus(200)
            ->assertViewIs('members.index');
    });

    test('user without role cannot view members index', function () {
        actingAs($this->noRoleUser);

        get(route('members.index'))
            ->assertStatus(403);
    });

});

describe('show action', function () {
    test('membership user can view a member', function () {
        actingAs($this->membershipUser);

        get(route('members.show', $this->member))
            ->assertStatus(200)
            ->assertViewIs('members.show')
            ->assertViewHas('member');
    });

    test('election user can view a member', function () {
        actingAs($this->electionUser);

        get(route('members.show', $this->member))
            ->assertStatus(200)
            ->assertViewIs('members.show');
    });

    test('user without role cannot view a member', function () {
        actingAs($this->noRoleUser);

        get(route('members.show', $this->member))
            ->assertStatus(403);
    });
});

describe('create action', function () {
    test('membership user can view create form', function () {
        actingAs($this->membershipUser);

        get(route('members.create'))
            ->assertStatus(200)
            ->assertViewIs('members.create');
    });

    test('election user cannot view create form', function () {
        actingAs($this->electionUser);

        get(route('members.create'))
            ->assertStatus(403);
    });

    test('user without role cannot view create form', function () {
        actingAs($this->noRoleUser);

        get(route('members.create'))
            ->assertStatus(403);
    });
});

describe('store action', function () {
    test('membership user can create a member', function () {
        actingAs($this->membershipUser);

        $data = [
            'username' => 'testuser',
            'email_target' => 'test@example.com',
            'email_nick' => 'testnick',
            'email_full' => 'test@full.com',
            'libera_nick' => 'liberatest',
            'libera_cloak' => 'test.cloak',
            'libera_cloak_applied' => '2024-01-01',
            'status' => MemberStatus::ACTIVE->value,
        ];

        post(route('members.store'), $data)
            ->assertRedirect()
            ->assertSessionHas('success', 'Member created successfully.');

        assertDatabaseHas('members', [
            'username' => 'testuser',
            'email_target' => 'test@example.com',
        ]);
    });

    test('election user cannot create a member', function () {
        actingAs($this->electionUser);

        $data = [
            'username' => 'testuser',
            'email_target' => 'test@example.com',
            'status' => MemberStatus::ACTIVE->value,
        ];

        post(route('members.store'), $data)
            ->assertStatus(403);

        assertDatabaseMissing('members', [
            'username' => 'testuser',
        ]);
    });

    test('user without role cannot create a member', function () {
        actingAs($this->noRoleUser);

        $data = [
            'username' => 'testuser',
            'email_target' => 'test@example.com',
            'status' => MemberStatus::ACTIVE->value,
        ];

        post(route('members.store'), $data)
            ->assertStatus(403);
    });

    test('validation fails for invalid data', function () {
        actingAs($this->membershipUser);

        post(route('members.store'), [])
            ->assertSessionHasErrors(['username', 'email_target', 'status']);
    });

    test('validation fails for duplicate username', function () {
        actingAs($this->membershipUser);

        post(route('members.store'), [
            'username' => $this->member->username,
            'email_target' => 'another@example.com',
            'status' => MemberStatus::ACTIVE->value,
        ])
            ->assertSessionHasErrors(['username']);
    });
});

describe('edit action', function () {
    test('membership user can view edit form', function () {
        actingAs($this->membershipUser);

        get(route('members.edit', $this->member))
            ->assertStatus(200)
            ->assertViewIs('members.edit')
            ->assertViewHas('member');
    });

    test('election user cannot view edit form', function () {
        actingAs($this->electionUser);

        get(route('members.edit', $this->member))
            ->assertStatus(403);
    });

    test('user without role cannot view edit form', function () {
        actingAs($this->noRoleUser);

        get(route('members.edit', $this->member))
            ->assertStatus(403);
    });
});

describe('update action', function () {
    test('membership user can update a member', function () {
        actingAs($this->membershipUser);

        $data = [
            'username' => 'updateduser',
            'email_target' => 'updated@example.com',
            'email_nick' => 'updatednick',
            'email_full' => 'updated@full.com',
            'libera_nick' => 'updatedlibera',
            'libera_cloak' => 'updated.cloak',
            'libera_cloak_applied' => '2024-02-01',
            'status' => MemberStatus::EMERITUS->value,
        ];

        put(route('members.update', $this->member), $data)
            ->assertRedirect(route('members.show', $this->member))
            ->assertSessionHas('success', 'Member updated successfully.');

        assertDatabaseHas('members', [
            'id' => $this->member->id,
            'username' => 'updateduser',
            'email_target' => 'updated@example.com',
            'status' => MemberStatus::EMERITUS->value,
        ]);
    });

    test('election user cannot update a member', function () {
        actingAs($this->electionUser);

        $data = [
            'username' => 'updateduser',
            'email_target' => 'updated@example.com',
            'status' => MemberStatus::EMERITUS->value,
        ];

        put(route('members.update', $this->member), $data)
            ->assertStatus(403);

        assertDatabaseHas('members', [
            'id' => $this->member->id,
            'username' => $this->member->username,
        ]);
    });

    test('user without role cannot update a member', function () {
        actingAs($this->noRoleUser);

        $data = [
            'username' => 'updateduser',
            'email_target' => 'updated@example.com',
            'status' => MemberStatus::EMERITUS->value,
        ];

        put(route('members.update', $this->member), $data)
            ->assertStatus(403);
    });

    test('validation fails for invalid data', function () {
        actingAs($this->membershipUser);

        put(route('members.update', $this->member), [])
            ->assertSessionHasErrors(['username', 'email_target', 'status']);
    });
});

describe('destroy action', function () {
    test('membership user can delete a member', function () {
        actingAs($this->membershipUser);

        delete(route('members.destroy', $this->member))
            ->assertRedirect(route('members.index'))
            ->assertSessionHas('success', 'Member deleted successfully.');

        assertDatabaseMissing('members', [
            'id' => $this->member->id,
        ]);
    });

    test('election user cannot delete a member', function () {
        actingAs($this->electionUser);

        delete(route('members.destroy', $this->member))
            ->assertStatus(403);

        assertDatabaseHas('members', [
            'id' => $this->member->id,
        ]);
    });

    test('user without role cannot delete a member', function () {
        actingAs($this->noRoleUser);

        delete(route('members.destroy', $this->member))
            ->assertStatus(403);

        assertDatabaseHas('members', [
            'id' => $this->member->id,
        ]);
    });
});
