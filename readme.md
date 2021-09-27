To implement the task, I decided to use lightweight, Lumen framework. It is quite similar to Laravel, and I found it 
to be more suitable for small applications. I was curious about this task, since I have no prior experience with Lumen.

To install the program, please use the default terminal commands for Lumen applications:

```
git clone git@github.com:weltkind/tournament.git
cd tournament
mv .env.dist .env
composer install
```

According to the assignment, I developed the console version of the game. To run php-cli version, use command:
```
php artisan begin
```

I also developed the web version of it to show the reuse of classes in different environments.


To run the web version, you need to start a server:
```
php -S localhost:8000 -t public
```

Open the url in a browser:

```
http://localhost:8000
```

Currently, each of knights has one of two random strategies of using magic items (shield and magic wand). 

On the next step, I'd like to add more strategies for magic items and fighting style ('brave', 'careful', 
'coward') which will also be randomly selected by knights. 

To see the basic version of the tournament without magic items, you need to switch to the 'version1' branch.

P.S.
I would like to thank you for such an engaging task. I worked on it with great pleasure and it helps me to get the 
first experience with Lumen.






