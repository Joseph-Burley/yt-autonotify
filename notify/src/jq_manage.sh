#!/bin/bash
#echo -e "$(jq -M --slurp 'map({name, age})' some_test.txt)"

#echo -e "$(jq -M -c --slurp '.[] | [.name, .age]' some_test.txt)"

echo -e "$(jq -M -c --slurp '.[] | {name, age}' some_test.txt)"
