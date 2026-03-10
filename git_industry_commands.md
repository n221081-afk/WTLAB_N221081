1. Git configuration commands
- git config --global user.name
purpose:
      It gives current repository username.
- git config --global user.email
purpose:
      It gives current repository email address
- git config --list
purpose:
displays all Git configuration settings currently applied to your environment.
- git config --unset
purpose:
it removes a configuartion entry from the config file
example:
git config --unset user.name

2. Repository setup commands:
- git init 
purpose:
intilizes a new repository

- git clone < repo url>
purpose:
copying an existing repository from github to local machine.
example:
git clone https://github.com/n221081-afk/WTLAB_N221081.git

- git clone -branch <branch name><repo url>
purpose:
it clones a specific branch from github
example:
git clone -branch develop https://github.com/n221081-afk/WTLAB_N221081.git

- git clone --depth <number><repo url>
purpose:
it clone with specific commit history.
example:
git clone -- depth 3  https://github.com/n221081-afk/WTLAB_N221081.git

3. Repo status and inspection:

- git status:
purpose:
it shows current repo status and tracked and untracked files
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git status
On branch main
Your branch is up to date with 'origin/main'.

Untracked files:
  (use "git add <file>..." to include in what will be committed)
Your branch is up to date with 'origin/main'.

Your branch is up to date with 'origin/main'.

Untracked files:
  (use "git add <file>..." to include in what will be committed)
        git_industry_commands.md

nothing added to commit but untracked files present (use "git add" to track)


- git log
purpose:
it shows commit history
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git log
commit 290562762c30b9c7900b6267f32f8b2b6f9eae6f (HEAD -> main, origin/main)
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 17 18:28:46 2026 +0530

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task
:
commit 290562762c30b9c7900b6267f32f8b2b6f9eae6f (HEAD -> main, origin/main)
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 17 18:28:46 2026 +0530

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task

commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
Author: n221081-afk <n221081@rguktn.ac.in>
:

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task

commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
Author: n221081-afk <n221081@rguktn.ac.in>
:

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task

commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Jan 6 16:38:34 2026 +0530
:

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task

commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Jan 6 16:38:34 2026 +0530

    added javascript features

:

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task

commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Jan 6 16:38:34 2026 +0530

    added javascript features

commit 152cf8a6fb32a083c5921c55557519fa3edadbc4
Author: A D G S N Chandrika <n221081@rguktn.ac.in>
Date:   Thu Dec 18 09:40:54 2025 +0530

    Delete rushi.html

commit cb659fc9d42121598c08a597ec3687ba0f764a8d
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Thu Dec 18 09:30:42 2025 +0530

    committed lab01 task
:

    Oauth commits

commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Feb 10 15:32:50 2026 +0530

    file functions and task

commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Tue Jan 6 16:38:34 2026 +0530

    added javascript features

commit 152cf8a6fb32a083c5921c55557519fa3edadbc4
Author: A D G S N Chandrika <n221081@rguktn.ac.in>
Date:   Thu Dec 18 09:40:54 2025 +0530

    Delete rushi.html

commit cb659fc9d42121598c08a597ec3687ba0f764a8d
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Thu Dec 18 09:30:42 2025 +0530

    committed lab01 task

commit fa1d2bf4ab2833918847df26c167a3d507859fe1
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Thu Dec 18 09:30:08 2025 +0530

    first commit
~
~
~
(END)

- git log --oneline
purpose:
shows condensed commit history.
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git log --oneline
2905627 (HEAD -> main, origin/main) Oauth commits
1dea952 file functions and task
68cd8a0 added javascript features
152cf8a Delete rushi.html
cb659fc committed lab01 task
fa1d2bf first commit

- git log --graph
purpose:
 it visuaalizes branch history
 example:
 
$ git log --graph
* commit 290562762c30b9c7900b6267f32f8b2b6f9eae6f (HEAD -> main, origin/main)
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 17 18:28:46 2026 +0530
|
|
* commit 152cf8a6fb32a083c5921c55557519fa3edadbc4
:...skipping...
* commit 290562762c30b9c7900b6267f32f8b2b6f9eae6f (HEAD -> main, origin/main)
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 17 18:28:46 2026 +0530
|
|     Oauth commits
|
* commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 10 15:32:50 2026 +0530
|
| Date:   Tue Jan 6 16:38:34 2026 +0530
|
|     added javascript features
|
* commit 152cf8a6fb32a083c5921c55557519fa3edadbc4
| Author: A D G S N Chandrika <n221081@rguktn.ac.in>
:...skipping...
* commit 290562762c30b9c7900b6267f32f8b2b6f9eae6f (HEAD -> main, origin/main)
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 17 18:28:46 2026 +0530
|
|     Oauth commits
|
* commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 10 15:32:50 2026 +0530
|
|     file functions and task
|
* commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Jan 6 16:38:34 2026 +0530
|
|     added javascript features
|
* commit 152cf8a6fb32a083c5921c55557519fa3edadbc4
| Author: A D G S N Chandrika <n221081@rguktn.ac.in>
| Date:   Thu Dec 18 09:40:54 2025 +0530
|
|     Delete rushi.html
|
* commit cb659fc9d42121598c08a597ec3687ba0f764a8d
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Thu Dec 18 09:30:42 2025 +0530
|
|     committed lab01 task
|
:...skipping...
* commit 290562762c30b9c7900b6267f32f8b2b6f9eae6f (HEAD -> main, origin/main)
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 17 18:28:46 2026 +0530
| 
|     Oauth commits
|
* commit 1dea95281128da4f30c8edb4a07d7e6fb0b958a9
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Feb 10 15:32:50 2026 +0530
| 
|     file functions and task
|
* commit 68cd8a0e4c2a597d07dab695d5d9b395dedd09a3
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Tue Jan 6 16:38:34 2026 +0530
|
|     added javascript features
|
* commit 152cf8a6fb32a083c5921c55557519fa3edadbc4
| Author: A D G S N Chandrika <n221081@rguktn.ac.in>
| Date:   Thu Dec 18 09:40:54 2025 +0530
|
|     Delete rushi.html
|
* commit cb659fc9d42121598c08a597ec3687ba0f764a8d
| Author: n221081-afk <n221081@rguktn.ac.in>
| Date:   Thu Dec 18 09:30:42 2025 +0530
|
|     committed lab01 task
|
* commit fa1d2bf4ab2833918847df26c167a3d507859fe1
  Author: n221081-afk <n221081@rguktn.ac.in>
  Date:   Thu Dec 18 09:30:08 2025 +0530

      first commit
:
git show
purpose:
it shows details about specific commit
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git show cb659fc
commit cb659fc9d42121598c08a597ec3687ba0f764a8d
Author: n221081-afk <n221081@rguktn.ac.in>
Date:   Thu Dec 18 09:30:42 2025 +0530

    committed lab01 task

diff --git a/Events.html b/Events.html
new file mode 100644
index 0000000..5454a9b
--- /dev/null
+++ b/Events.html
@@ -0,0 +1,31 @@
+<!DOCTYPE html>
+<html lang="en">
+<head>
+    <meta charset="UTF-8">
+    <meta name="viewport" content="width=device-width, initial-scale=1.0">
+    <title>Events</title>
+    <style>
:

- git diff
purpose:
it shows differene between working directory and stagging area

- git diff -stagged
purpose:
it shows stagged changes waiting for commit

- git blame
purpose:
Shows which commit last modified each line of a file
example:

adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git blame
usage: git blame [<options>] [<rev-opts>] [<rev>] [--] <file>

    <rev-opts> are documented in git-rev-list(1)

    --[no-]incremental    show blame entries as we find them, incrementally
    -b                    do not show object names of boundary commits (Default: off)
    --[no-]root           do not treat root commits as boundaries (Default: off)
    --[no-]show-stats     show work cost statistics
    --[no-]progress       force progress reporting
    --[no-]score-debug    show output score for blame entries
    -f, --[no-]show-name  show original filename (Default: auto)
    -n, --[no-]show-number
                          show original linenumber (Default: off)
    -p, --[no-]porcelain  show in a format designed for machine consumption
    --[no-]line-porcelain show porcelain format with per-line commit information
    -c                    use the same output mode as git-annotate (Default: off)
    -t                    show raw timestamp (Default: off)
    -l                    show long commit SHA1 (Default: off)
    -s                    suppress author name and timestamp (Default: off)
    -e, --[no-]show-email show author email instead of name (Default: off)
    -w                    ignore whitespace differences
    --[no-]ignore-rev <rev>
                          ignore <rev> when blaming
    --[no-]ignore-revs-file <file>
                          ignore revisions from <file>
    --[no-]color-lines    color redundant metadata from previous line differently
    --[no-]color-by-age   color lines by age
    --[no-]minimal        spend extra cycles to find better match
    -S <file>             use revisions from <file> instead of calling git-rev-list
    --[no-]contents <file>
                          use <file>'s contents as the final image
    -C[<score>]           find line copies within and across files
    -M[<score>]           find line movements within and across files
    -L <range>            process only line range <start>,<end> or function :<funcname>
    --[no-]abbrev[=<n>]   use <n> digits to display object names

- git reflog
purpose:
dispays refernce history of head
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git reflog
2905627 (HEAD -> main, origin/main) HEAD@{0}: commit: Oauth commits
1dea952 HEAD@{1}: commit: file functions and task
68cd8a0 HEAD@{2}: commit: added javascript features
152cf8a HEAD@{3}: pull origin main: Fast-forward
cb659fc HEAD@{4}: commit: committed lab01 task
fa1d2bf HEAD@{5}: Branch: renamed refs/heads/master to refs/heads/main
fa1d2bf HEAD@{7}: commit (initial): first commit


- git shortlog
purpose:
summarizss commits by author.
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git shortlog
A D G S N Chandrika (1):
      Delete rushi.html

n221081-afk (5):
      first commit
      committed lab01 task
      added javascript features
      file functions and task
      Oauth commits

:


4. file tracking commands:

- git add <filename>
purpose:
it adds that dpecific file to staging area
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git add git_industry_commands.md

- git add .
purpose:
it adds all untracked files in staging area.
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git add .

- git add -p:
purpose:
Interactively stage parts of changes.
example:
adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
$ git add -p
diff --git a/git_industry_commands.md b/git_industry_commands.md
index f03060f..078befa 100644
--- a/git_industry_commands.md
+++ b/git_industry_commands.md
@@ -425,4 +425,18 @@ n221081-afk (5):

 - git add <filename>
 purpose:
-it ad the
\ No newline at end of file
+it adds that dpecific file to staging area
+example:
+adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
+$ git add git_industry_commands.md
+
+- git add .
+purpose:
+it adds all untracked files in staging area.
+example:
+adari@Daniya MINGW64 /c/xampp/htdocs/Task01_EventNest (main)
+$ git add .
+
+- git add -p:
+purpose:
+

- git restore
git restore file.txt
p:
Restores file to last committed version.

- git restore --staged
git restore --staged file.txt
p:
Removes file from staging area.

- git rm
git rm file.txt
p:
Deletes file and stages removal.

-git mv
git mv old.txt new.txt
p:
Renames or moves file.


5. Commit Commands
-git commit
git commit
p:
Creates commit using default editor.

-git commit -m
git commit -m "message"
p:
Creates commit with message.

-git commit --amend
git commit --amend
p:
Modifies last commit.

-git commit --no-edit
git commit --amend --no-edit
p:
Amends commit without editing message.

6. Branch Management
-git branch
git branch
p:
Lists branches.

-git branch -a
git branch -a
p:
Shows local and remote branches.

-git branch -d
git branch -d branch-name
p:
Deletes branch safely.

-git branch -D
git branch -D branch-name
p:
Force deletes branch.

-git checkout
git checkout branch-name
p:
Switches branch.

-git checkout -b
git checkout -b new-branch
p:
Creates and switches branch.

-git switch
git switch branch-name
p:
Modern branch switching.

-git switch -c
git switch -c new-branch
p:
Creates and switches branch.

7. Merge Commands
-git merge
git merge branch-name
p:
Merges branch into current branch.

-git merge --no-ff
git merge --no-ff branch-name
p:
Forces a merge commit.

8. Remote Repository Commands
-git remote
git remote
p:
Lists remote repositories.

-git remote -v
git remote -v
p:
Shows remote URLs.

-git remote add
git remote add origin repo-url
p:
Adds remote repository.

-git remote remove
git remote remove origin
p:
Removes remote.

-git fetch
git fetch
p:
Downloads changes from remote.

-git fetch --all
git fetch --all
p:
Fetches all remotes.

-git pull
git pull
p:
Fetch + merge.

-git pull --rebase
git pull --rebase
p:
Fetch + rebase.

-git push
git push
p:
Push commits to remote.

-git push -u origin branch-name
git push -u origin feature
p:
Push and set upstream branch.

-git push --force
git push --force
p:
Force push changes.


10. stash commands
- git stash

Purpose:
Temporarily saves changes.

Example

git stash

- git stash list

Purpose:
Shows saved stashes.

Example

-git stash list
-git stash pop

Purpose:
Applies and removes stash.

Example

git stash pop

-git stash apply

Purpose:
Applies stash without deleting it.

Example

git stash apply

-git stash drop

Purpose:
Deletes a stash entry.

Example

git stash drop

-git stash clear

Purpose:
Removes all stashes.

Example

git stash clear


10. Reset & Undo Commands
-git reset

Purpose:
Resets current HEAD to a specified state.

Example

git reset HEAD file.txt

-git reset --soft

Purpose:
Undo commit but keep changes staged.

Example

git reset --soft HEAD~1

-git reset --mixed

Purpose:
Undo commit and unstage changes.

Example

git reset --mixed HEAD~1

-git reset --hard

Purpose:
Undo commit and delete changes.

Example

git reset --hard HEAD~1

-git revert

Purpose:
Creates new commit to undo previous commit.

Example

git revert commitID

-git clean -f

Purpose:
Removes untracked files.

Example

git clean -f

-git clean -fd

Purpose:
Removes untracked files and directories.

Example

git clean -fd


11. Rebasing Commands
-git rebase

Purpose:
Moves commits to a new base.

Example

git rebase main

-git rebase -i

Purpose:
Interactive rebase for editing commits.

Example

git rebase -i HEAD~3

-git rebase --continue

Purpose:
Continues rebase after conflict resolution.

Example

git rebase --continue

-git rebase --abort

Purpose:
Cancels rebase process.

Example

git rebase --abort


12. Cherry Pick & Patch
git cherry-pick

Purpose:
Applies a specific commit to current branch.

Example

git cherry-pick commitID

-git format-patch

Purpose:
Creates patch files from commits.

Example

git format-patch HEAD~1

-git apply

Purpose:
Applies patch file.

Example

git apply patchfile.patch

-git am

Purpose:
Applies patches generated by format-patch.

Example

git am patchfile.patch

13. Tagging Commands

-git tag

Purpose:
Creates a lightweight tag.

Example

git tag v1.0

-git tag -a

Purpose:
Creates an annotated tag.

Example

git tag -a v1.0 -m "Release version"

-git tag -d

Purpose:
Deletes a tag.

Example

git tag -d v1.0

-git push origin --tags

Purpose:
Pushes all tags to remote repository.

Example

git push origin --tags

14. Submodule Commands
git submodule add

Purpose:
Adds another repository as a submodule.

Example

git submodule add https://github.com/user/library.git
git submodule init

Purpose:
Initializes submodules.

Example

git submodule init
git submodule update

Purpose:
Updates submodules.

Example

git submodule update
15️⃣ Debugging Commands
git bisect

Purpose:
Helps find the commit that introduced a bug.

Example

git bisect
git bisect start

Purpose:
Starts the bisect process.

Example

git bisect start
git bisect good

Purpose:
Marks a commit as good.

Example

git bisect good
git bisect bad

Purpose:
Marks a commit as bad.

Example

git bisect bad