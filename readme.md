CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * MODULE FEATURES
 * Configuration
 * Maintainers


INTRODUCTION
------------
In a high commenting site it is difficult for admins to monitor and review every
comment before publishing ,and to allow smooth conversation if a system is there
to perform checks on comment for approval than it will allow in better
experience and comment administrative task.

REQUIREMENTS
------------

No special requirements


INSTALLATION
------------

Install as you would normally install a contributed Drupal module. See:
https://drupal.org/documentation/install/modules-themes/modules-8 for further
information.

MODULE FEATURES
---------------
 * This system will perform various test before making a comment publish.
 * Some of the examples of tests include profanity test, sentiment test.
 * Admin has the option to allow which tests will be perform on comments on his site.
 * If a comment passes all the selected tests than the comment will be automatically
   approved otherwise the comment will remain unpublish and will go for manual
   approval from admin.
 * It is easy to add new tests by writing comment approver plugin.

CONFIGURATION
-------------

 * After installing, go to: admin/config/comment_approver/commentapproversettings

 * Select which tests you want to perform on a comment before approving.


MAINTAINERS
-----------

Current maintainers:
 * Hemant Gupta (https://www.drupal.org/u/guptahemant)
