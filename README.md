# Outlaw

A very dangerous PHP library maybe you will need.

Help you build applications in a very dirty and fast way.

## The Outlaw says:
> I know sometimes after you implemented html and css, you hope your application is fucking finished.
> Unfortunately, it's too dirty and dangerous to do so.
> Don't worry. Let me do all the dirty stuff for you.
> But listen, you may pay for this.
> Be careful.

## Features
* No migration files.
* Build the database tables with HTML.
* Type as less characters as possible.
* Security isn't the first thing the Outlaw cares.
* You Need to obey instructions the Outlaw ask you to do.

## Rules
* Prefix every html input fields name the Outlaw needed with 'ol_'
* You only need to pass the table name and primary key in the controller if needed, all the other parameters the outlaw will handle.

## Setup
No migration needed, no database schema needed.
In config file, set database name and password.
```php
// config.php

$config['database'] = array(
    'dns' => 'mysql:host=localhost;dbname=koala',
    'user' => 'koala',
    'password' => 'koala'
);
```

Let's start!

## Example

Let's say, you need a blogging system.

### Create

First we need a place to create articles.
We need two fields 'title' and 'content'.

```html
<form action='/blog/create' method='post'>
    Title: <input type='text' name='ol_title' />
    Content: <input type='text' name='ol_content' />
    <input type='submit' value='SEND' />
</form>
```

And then tell the outlaw where to **inject** the data in the blog controller.
```php
function __construct(){
    $this->ol = new Outlaw();
}

public function create()
{
    $this->ol->inject('articles');
}    
```
Now check your database, the articles table is created, and you just inserted one row into it!

### Read

Ok, we also need a place to see all the articles.
Let's **gather** them first.
```php
public function index(){
    $this->data['articles'] = $this->ol->gather('articles');
    $this->template->build('product/index', $this->data);
}
```

So you can use them.
```php
<?php foreach($articles as $a): ?>
    <?php echo $a->title ?>
    <?php echo $a->content ?>
<?php endforeach; ?>
```
To view a single article, tell the outlaw the table name and id to **take** it.
```php
function view($id){
    $this->data['article'] = $this->ol->take('articles', $id);
    $this->template->build('demo/view', $this->data);        
}
```

### Update

To edit an article, tell the outlaw the table name and id to **pollute** it.
```php
function update(){
    $id = $_POST['ol_id'];
    $this->ol->pollute('articles', $id))
    redirect('/blog/view/' . $id);
}
```

### Delete

To delete an article, tell the outlaw the table name and id so outlaw can know who to **murder**.
```php
function delete(){
    $id = $_REQUEST['id'];
    $this->ol->murder('articles', $id);
    redirect('/blog');
}
```

### Upload File
Set the upload path in config.php.
```php
$config['upload_path'] = './upload/';             
        
```

Then in the html:

```html
<label>Person</label>
<input type="file" name='ol_person'>

<label>Logo</label>
<input type="file" name='ol_logo'>
```

Outlaw will rename the files, store them in the path, and save the file name in attributes.

For instance, we could show the above files like this:

```php
    <img src='/upload/<?php echo $article->person ?>' />    
    <img src='/upload/<?php echo $article->logo ?>' />    
```

## Advanced Topics
### One-to-many Relationship
Let's say you want to assign an author for the article.
The user has an id value of '5' in 'users' table.
```html
<form action='/blog/create' method='post'>
    <input type='hidden' name='ol_belong_users' value='5'>
    Title: <input type='text' name='ol_title' />
    Content: <input type='text' name='ol_content' />
    <input type='submit' value='SEND' />
</form>
```
* prefix with ol_belong_
* followed by the table name
* set value as the id of the parent

Then you can utilize the relationship as this(notice the **ownArticles** attributes created by the outlaw):
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
$config['rules'] = array(
    'articles' => array(
        // notice the attribute is wrapped in an array even it's just a string
        'required' => [['ol_title'], ['ol_content']],
        'lengthMin' => [['ol_title', 5], ['ol_content', 10]]
    ),
    'stores' => [
        'required' => [ ['ol_name'], ['ol_boss'], ['ol_phone'], ['ol_address'] ]
    ]
);
```
It utilize in **inject** and **pollute** method.
If fail to pass validation, they return false. 
And you can get validation error message by getError methd.
```php
      if ($this->ol->pollute('articles', $id)){
          redirect('/demo/view/' . $id);
      }
      else{
          exit(var_export($this->ol->getErrors()));
      }

```

### Upload Multiple Files
Setup the config file as upload single file.

Then in the html, add 'multiple' attribute and '[]' to the name:

```html
<label>Photos</label>
<input type="file" name='ol_photos[]' multiple>
```
Because it's no longer one-to-one relationship, so we cannot use the same table.
Outlaw will create a 'photos' table, which only contains 'id', 'name', and 'articles_id' as foreign key.

And the usage becomes:
```php
<?php foreach($article->ownPhotos as $photo): ?>
    <img src='/upload/<?php echo $photo->name ?>' />    
<?php endforeach; ?>
```


## Reserved Words in html input name
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
That's why the table name and id is the only thing determined in the controller rather than in the html.

## API
* inject ($table_name)

> Insert other $_REQUEST parameters prefixed with 'ol_' into $table_name.

* take ($table_name, $id)

> Fetch one single row.

* pollute ($table_name, $id)

> Update one single row.

* murder ($table_name, $id)

> Delete one row.

* gather ($table_name)

> Get all the rows.

## Technical Detail
* Manipulate the database with Redbeanphp 3.5

http://redbeanphp.com/manual3_0/quick_tour

That's why the Outlaw doesn't need migrations or existing tables.

* Validating with Valitron 1.1.7

https://github.com/vlucas/valitron

* Using $_REQUEST array in PHP directly, so you can pass variable either by GET or POST or even COOKIE.

## Todo

* Many-to-many relationship

* More security maybe ...
