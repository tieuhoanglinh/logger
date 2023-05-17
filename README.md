# Prerequisites:
*  PHP installed
# How to use:
* Go to root directory
* run `php execute.php`
# Change Configurations:
* `execute.php` file, line 9: `ini_set('error_prepend_string', 'console');`
    - console -> LogConsoleAdapter
    - email -> LogEmailAdapter
    - file_system -> LogFileSystemAdapter
    - api -> LogApiAdapter
    ... and so on
* `execute.php` file, line 10: `ini_set('error_log', 'console:1|email:2|file_system:3|api:4');`
    - console:1 => `LogConsoleAdapter` using log level 1 (`DEBUG`)
    - email:2 => `LogEmailAdapter` using log level 2 (`INFO`)
    - file_system:3 => `LogFileSystemAdapter` using log level 3 (`WARNING`)
    - api:4 => `LogApiAdapter` using log level 4 (`ERROR`)
* Log Level:
    - 1 => DEBUG
    - 2 => INFO
    - 3 => WARNING
    - 4 => ERROR
# Improvement:
* Use efficient algorithms and data structures
* Avoid nested loops
* Optimize loops
* Cache
* Use lazy evaluation
* Using singleton for create a new Log() object
* Using class Config to storage config variables
* In `logger.php` file, line 31:
    - Define `ini_get('error_log')` as 1-dimenson array, so that we don't need to use `explode` twice times, it's look more simple
    - exit the foreach loop when found the corresponding `$this->adapterLevelArr` at line 33, we don't need loop to the end.
* In `Logger.php` file, line 45:
    - Create an array for storage the config, so, we can remove this switch case
    - Example:
    [
        'console' => 'LogConsoleAdapter',
        'email' => 'LogEmailAdapter',
        'file_system' => 'LogFileSystemAdapter',
        'api' => 'LogApiAdapter'
    ]
* We can create a new command for generate new Adapter automatically, don't need to create new Adapter manually, less action, less bugs.

# To make this Logger more open for modification, there are serveral things we could do:

* Write modular code: Break code down into small, reusable modules that perform specific tasks. This makes it easier to modify or replace individual parts of the code without affecting the rest of the system.
  
*  Use clear and consistent naming conventions: Use names that accurately describe what each module, function, and variable does. This makes it easier for others to understand the code and modify it as needed.
  
*  Documentation: Add comments to explain what each part does and how it fits into the overall system. This makes it easier for others to understand and make modifications without breaking anything.
  
*  Use design patterns: Use well-known design patterns like MVC (Model-View-Controller) or Dependency Injection to separate concerns and make your code more modular and easier to modify.
  
*  Write test cases: Write automated test cases  to ensure that modifications don't break existing functionality. This makes it easier for others to modify code with confidence that they're not introducing bugs.


