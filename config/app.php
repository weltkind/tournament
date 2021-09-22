<?php

return [
    'dignities' => ['Lord', 'Sir', 'Barron', 'Earl', 'Marquis', 'Duke', 'Viscount', 'Chevalier'],
    'names' => ['Allan', 'Alford', 'Alvertos', 'Ballard', 'Beacher', 'Birch', 'Burgess', 'Calder', 'Dover', 'Elmer',
        'Kent', 'Lang', 'Miller', 'Oakley', 'Ramsey', 'Redford', 'Terrel', 'Winthrop'],

    'sobriquets' => ['Bull', 'Boar', 'Wild', 'Black', 'Baleful', 'Virulent', 'Brave', 'Hawk', 'Stout',
        'Ironside', 'Daring', 'Savage', 'Ruthless', 'Grim', 'Fell'],

    'rewards' => ['hot handshake', 'best regards', 'royal blessing', 'nice words', 'kind parting words'],

    'cube' => [1, 3, 6, 9, 12, 15],

    'validation' => [
        'amount' => ['rules' => ['required', 'numeric', 'max:100', 'gt:0', 'min:2'],
        'messages' => [
            'required' => 'I need to know haw many guests will we have...',
            'numeric' => '2, 5, 100... Only digits, please.',
            'max' => 'Too much members. The king will fall asleep while they finish. And the treasury is empty...',
            'gt' => 'Hmmm... Not in our Universe',
            'min' => 'He will fight with himself, really?']
        ]
    ]

];
