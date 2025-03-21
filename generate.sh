#!/usr/bin/env bash
set -efu
set -o errexit

{ # this ensures the entire script is downloaded #

# METHODS #
	color() {
		echo -e "$1\e[39m\033[0;37m\e[0m"
	}
	
	error() {
		color "\n\e[91m\033[41m\e[K"
		color "\e[1;37m\033[41m\e[K  ERROR"
		color "\e[1;37m\033[41m\e[K  $1\e[K"
		color "\e[91m\033[41m\e[K \n"
	}
	
	has() {
		type "$1" > /dev/null 2>&1
	}
	
# VARIABLES #
	AUTO_UPLOAD=1
	PHPDOC="$(which phpDocumentor)"	
	WORKING_DIR=$(pwd)

# HANDLING #
	if [ $PHPDOC = "" ]; then
		error "Can't find phpDocumentor!\n  Please install phpDocumentor first."
	else
		color "\e[32m[OK]\e[39m Found phpDocumentor on: $PHPDOC"
		color "\e[32m[OK]\e[39m Working on Directory: $WORKING_DIR"
		
		# Generate the Docs
		php $PHPDOC run --template="$WORKING_DIR/Docs/theme" --cache-folder="$WORKING_DIR/tmp" --directory="$WORKING_DIR" --target="$WORKING_DIR/tmp/Docs"

		# Move Docs
		[ -f "$WORKING_DIR/tmp/Docs/classes/AlfaDNS/AlfaDNS.md" ] && (mv "$WORKING_DIR/tmp/Docs/classes/AlfaDNS/AlfaDNS.md" "$WORKING_DIR/Docs/README.md")
		
		# Update Git
		if [ $AUTO_UPLOAD = 1 ]; then
			color "\e[32m[OK]\e[39m Uploading to Git"
			git add . && git commit -m "Updating Docs" & git push
		fi
	fi
} # this ensures the entire script is downloaded #
