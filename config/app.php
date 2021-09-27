<?php

return [
    'dignities' => ['Lord', 'Sir', 'Barron', 'Earl', 'Marquis', 'Duke', 'Viscount', 'Chevalier'],
    'names' => ['Allan', 'Alford', 'Alvertos', 'Ballard', 'Beacher', 'Birch', 'Burgess', 'Calder', 'Dover', 'Elmer',
        'Kent', 'Lang', 'Miller', 'Oakley', 'Ramsey', 'Redford', 'Terrel', 'Winthrop'],
    'sobriquets' => ['Bull', 'Boar', 'Wild', 'Black', 'Baleful', 'Virulent', 'Brave', 'Hawk', 'Stout',
        'Ironside', 'Daring', 'Savage', 'Ruthless', 'Grim', 'Fell'],
    'rewards' => ['firm handshake', 'best regards', 'royal blessing', 'nice words'],

    'cube' => [1, 3, 6, 9, 12, 15],

    'validation' => [
        'amount' => ['rules' => ['required', 'numeric', 'max:100', 'gt:0', 'min:2'],
        'messages' => [
            'required' => 'I need to know haw many guests we are expecting...',
            'numeric' => '2, 5, 100... Digits only, please.',
            'max' => 'Too many guests. The King will fall asleep until they are done. Besides, our treasury is empty...',
            'gt' => 'Hmmm... Not in this Universe',
            'min' => 'He will fight against himself, really?']
        ]
    ]

];
