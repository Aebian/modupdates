# OctoberCMS Mod Updates Plugin

#### A plugin which utilizes to GitLab API to show informations about certain issues for my friends at Gruppe W  (https://gruppe-w.de).
---
## Details
This plugin will provide a components to display certain issues of a project based on the [GitLab API v4](https://gitlab.gruppe-w.de/api/v4/). 

### Requirements
In order to work the [PHP cURL extension](https://secure.php.net/manual/en/book.curl.php) must be installed and enabled.

## Documentation

### IssueList
List public issues for the specified project.

#### Parameters
|     Name      |   Type   |                                                 Description                                                 |
|:------------  |:---------|:------------------------------------------------------------------------------------------------------------|
| `tracker`     | `string` | The name of the project to get issues from.                                                                 |
| `label`       | `string` | The name of the label from which issues should be displayed with.                                           |
| `state`       | `string` | Wheather open or closed issues or even all should be displayed.                                             |
| `accesstoken` | `string` | The access token (private_token) for authentication against the API.

