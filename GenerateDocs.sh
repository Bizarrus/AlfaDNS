#!/usr/bin/env bash
set -efu
set -o errexit

if [ "$(which phpDocumentor)" = "" ]; then
	echo "phpDocumentor not installed!"
fi

dir=$(pwd)

echo "Working-Path: $dir"

# Generate the Docs
php /usr/local/bin/phpDocumentor run --template="/opt/Website/Libraries/AlfaDNS/Docs/theme" --cache-folder="/tmp" --directory="/opt/Website/Libraries/AlfaDNS/" --target="/opt/Website/Libraries/AlfaDNS/Docs"

# Remove unwanted Files
mv ./Docs/classes/AlfaDNS/AlfaDNS.md ./Docs/README.md
rm -rf ./Docs/classes
rm -rf ./index.md