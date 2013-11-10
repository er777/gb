 
#!/usr/bin/php
<?php
 
/**
 * About: Small script to use if you don't want to do: 
 * git add . && git commit && git push
 * If you use a public URL, then the public URL will 
 * be rewritten to a private URL
 *  
 * install: save script as e.g. git_all.sh in a bin/ folder
 * usage: git_all.sh "my commit message"
 */
 
$git_add = "git add . ";
system($git_add);
 
if (isset($argv[1])) {
    $message = $argv[1];
} else {
    $message = "auto commit";
}
 
$git_commit = "git commit -m \"$message\" ";
system($git_commit);
 
$origin = git_get_remote_origin ();
$push_url = git_public_to_private ($origin);
 
$git_push = "git push $push_url";
system($git_push);
 
 
function git_public_to_private ($url) {
    //public:  git://github.com/diversen/image.git
    //private: git@github.com:diversen/image.git
 
    $ary = parse_url (trim($url));
    // is private?
    $num = count($ary);
    if ($num == 1) return $ary['path'];
    return "$ary[scheme]@$ary[host]:$ary[path]";
}
 
function git_get_remote_origin () {
    return shell_exec("git config --get remote.origin.url");
}