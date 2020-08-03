<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Events\ComponentGroup;

use CachetHQ\Cachet\Bus\Events\ActionInterface;
use CachetHQ\Cachet\Models\ComponentGroup;
use CachetHQ\Cachet\Models\User;

final class ComponentGroupWasRemovedEvent implements ActionInterface, ComponentGroupEventInterface
{
    /**
     * The user who removed the component group.
     *
     * @var \CachetHQ\Cachet\Models\User
     */
    public $user;

    /**
     * The component group that was removed.
     *
     * @var \CachetHQ\Cachet\Models\ComponentGroup
     */
    public $group;

    /**
     * Create a new component group was removed event instance.
     *
     * @param \CachetHQ\Cachet\Models\User           $user
     * @param \CachetHQ\Cachet\Models\ComponentGroup $group
     *
     * @return void
     */
    public function __construct(User $user, ComponentGroup $group)
    {
        $this->user = $user;
        $this->group = $group;
    }

    /**
     * Get the event description.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Component Group was removed.';
    }

    /**
     * Get the event action.
     *
     * @return array
     */
    public function getAction()
    {
        return [
            'user'        => $this->user,
            'description' => (string) $this,
        ];
    }
}
