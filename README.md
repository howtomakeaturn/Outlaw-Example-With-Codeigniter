# Outlaw

A very dangerous PHP library maybe you will need.
It implements every feature your teachers ask you not to do.

## The Outlaw says:
> I know sometimes after you implement html and css, you hope your application is fucking finished.
> Unfortunately, it's impossible. It's too dirty and dangerous to do so.
> Don't worry. Let me do all the dirty stuff for you.
> But listen, you may pay for this.
> Be careful.

## Features
* Help you build tables in a very dirty but really fast way.
* Guess the table name and fields from HTML.
* Security isn't the first thing the Outlaw cares.
* You Need to obey the instructions Outlaw ask you to do.

## Rules
* Prefix every html input fields name with 'ol_'
* The input 'ol_table' determines which table to manipulate.
* The input 'ol_id' is the primary key if needed.
* Pass everything via url parameters if possible.

## Setup
In config file, set database name and password.
No migration needed, no database schema needed.

## Example

Let's say, you need a blogging system.

view
```html
<form action='/blog/create' method='post'>
    Table Name: Articles<input type='hidden' name='ol_table' value='articles' />
    Title: <input type='text' name='ol_title' />
    Content: <input type='text' name='ol_content' />
    <input type='submit' value='SEND' />
</form>
```
* we want to create a 'articles' table
* We need two fields 'title' and 'content'

controller
```php
public function create()
{
    $ol = new Outlaw();
    $ol->inject();
}    
```
You don't need to pass any arguments in controller.
You don't need to implement any models for database.
The Outlaw do all the evil things for you!

Now check your database, the 'articles' table is created, and you just inserted one row into it!

## Advanced Topics
### One-to-many Relationship
Let's say you want to assign an author for the article.
The user has an id value of 5 in table.
```html
<form action='/blog/create' method='post'>
    Table Name: Articles<input type='hidden' name='ol_table' value='articles' />
    <input type='hidden' name='ol_belong_users' value='5'>
    Title: <input type='text' name='ol_title' />
    Content: <input type='text' name='ol_content' />
    <input type='submit' value='SEND' />
</form>
```
* prefix with ol_belong_
* followed by the table name
* set value as the id of the parent

Then you can utilize the relationship as this:
```php
// child to parent
// Notice it's defined by the table name. 
// Although you think 'user' is better than 'users'.
echo $article->users->name;

// parent to children
$user = $ol->take('users', '5');
foreach ($user->ownArticles as $article){
    echo $article->title;
}
```

### Validation
Validating with Valitron:

https://github.com/vlucas/valitron

```php
    // Set all the fields and table in config file.
    $this->validate = array(
        'articles' => array(
            // notice the attribute is wrapped in an array even it's just a string
            'required' => [['ol_title'], ['ol_content']],
            'lengthMin' => [['ol_title', 5], ['ol_content', 10]]
        )
    );

```
It utilize in inject and pollute method.
If fail to pass validation, they return false. 
And you can get validation error message by getError methd.
```php
      if ($id = $this->ol->pollute('articles')){
          redirect('/demo/view?ol_id=' . $id);
      }
      else{
          exit(var_export($this->ol->getErrors()));
      }

```

## Reserved Words in html input name
* ol_id
* ol_belong_*

## Design Principle
### Type as less characters as possible
* If you type any kind of attribute name in html, then you don't need to type it again in controller, model, migration, and sql server.
* If type it in controller is shorter, then don't type it in html:
```php
    $ol->inject('articles');
```
is much shorter than
```html
    <input type='hidden' name='ol_table' value='articles' />
```

## API
* inject (create)

> expects $_REQUEST['ol_table'] and other parameters prefixed with 'ol_'

* take (read)

> expects $_REQUEST['ol_table'] and $_REQUEST['ol_id']

* pollute (update)

> expects $_REQUEST['ol_table'], $_REQUEST['ol_id'], and other parameters prefixed with 'ol_'

* murder (delete)

> expects $_REQUEST['ol_table'] and $_REQUEST['ol_id']

* gather (getAll)

> expects $_REQUEST['ol_table']

## Technical Detail
* Manipulate the database with Redbeanphp 3.5

http://redbeanphp.com/manual3_0/quick_tour

That's why the Outlaw doesn't need migrations or existing tables.

* Validating with Valitron 1.1.7

https://github.com/vlucas/valitron

* Using $_REQUEST array in PHP directly, so you can pass variable either by GET or POST or even COOKIE.

