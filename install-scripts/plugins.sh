#!/bin/bash

function main {
    install_prompt
}

function install_prompt {
    options=(two-factor advanced-custom-fields codepress-admin-columns matomo relevanssi restricted-site-access safe-svg stream wordpress-seo )
    echo "Please choose a plugin:"
    printf "%s\n" "${options[@]}" | fzy | xargs wp plugin install

    yes_or_no "Do you want to activate this plugin" && echo "cool"
}

function yes_or_no {
    while true; do
        read -p "$* [y/n]: " yn
        case $yn in
            [Yy]*) return 0  ;;  
            [Nn]*) echo "Aborted" ; return  1 ;;
        esac
    done
}

main