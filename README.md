# dealership-inventory-management
Dealership Inventory Management System
--------------------------------------

Separates all database/business logic using the MVC pattern.
- Directories use MVC to separate layers

Routes all URLs and leverages a templating language using the Fat-Free framework.
- index.php

Has a clearly defined database layer using PDO and prepared statements.
- model/database/

Data can be viewed, added, updated, and deleted.
- View: live.html, views/admin/remove.html, views/employee/vehicle-info.html
- Add: views/admin/add-car.html
- Updated: views/employee/update-status.html
- Deleted: views/admin/remove.html

Has a history of commits from both team members to a Git repository.
- You're here!

Uses OOP, and defines multiple classes, including at least one inheritance relationship.
- classes/...

Contains full Docblocks for all PHP files.
- model/..., classes/...

Has full validation on the client side through JavaScript and server side through PHP.
- model/..., javascript/...

Incorporates jQuery and Ajax.
- javascript/additional-info.js
- javascript/ajax-request.js
