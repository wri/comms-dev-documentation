#!/bin/bash

# Example usage:
# ./check-updates.sh > updates-report-20200213.txt

sites=(
    accessinitiative1
    initiative20x20org
    wricidades1
    afr1001
    wriciudades
    beinitiative1
    sfproducts1
    wrimexico1
    edindex1
    wri-indonesia9
    wriorg
    forestlegality1
    wrirosscities1
    ghgprotocol1
    wribrasil
    wrisehirler1
)

for i in "${sites[@]}"; do
    echo "Site: $i"
    terminus drush $i.live -- ups --quiet
    echo "-----"
done
