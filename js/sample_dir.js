// NOT JSON BECAUSE OF CROSS-ORIGIN ISSUES WHEN RUNNING IN FILE:// MODE

var dir = [
  {
    "rcs": "etzinj",
    "type": "Student",
    "fname": "Justin",
    "mname": "Robert",
    "lname": "Etzine",
    "class": "Junior",
    "curriculum": "Computer Science",
    "homepage": "http://justetz.com/"
  },
  {
    "rcs": "sparkd",
    "type": "Student",
    "fname": "David",
    "mname": "Charles",
    "lname": "Sparkman",
    "class": "Sophomore",
    "curriculum": "Information Technology & Web Science",
    "homepage": "http://davidsparkman.tech"
  },
  {
    "rcs": "cinnak",
    "type": "Student",
    "fname": "Kayla",
    "mname": "Marie",
    "lname": "Cinnamon",
    "class": "Sophomore",
    "curriculum": "Information Technology & Web Science",
    "homepage": null
  },
  {
    "rcs": "gricer",
    "type": "Faculty and Staff",
    "fname": "Roger",
    "lname": "Grice",
    "title": "Professor of Practice",
    "department": "Communication and Media",
    "telephone": "518-276-6387",
    "fax": "518-276-4092",
    "office": "4402 Russell Sage Laboratory (SAGE)",
    "mailstop": "SA Sage Bldg",
    "mailing": "Roger Grice\nSA Sage Bldg\nRensselaer Polytechnic Institute\n110 8th Street\nTroy, NY 12180",
    "homepage": "http://www.rpi.edu/~gricer"
  },
  {
    "rcs": "bennett",
    "type": "Faculty and Staff",
    "fname": "Audrey",
    "mname": "Grace",
    "lname": "Bennett",
    "title": "Associate Professor",
    "department": "Communication and Media",
    "telephone": "518-276-8129",
    "fax": "518-276-4092",
    "office": "4708 Russell Sage Laboratory (SAGE)",
    "mailstop": "SA Sage Bldg",
    "mailing": "Audrey Grace Bennett\nSA Sage Bldg\nRensselaer Polytechnic Institute\n110 8th Street\nTroy, NY 12180",
    "homepage": "http://www.rpi.edu/~bennett"
  },
  {
    "rcs": "kimbam2",
    "type": "Faculty and Staff",
    "fname": "Miles",
    "mname": "A",
    "lname": "Kimball",
    "title": "Professor & Department Head",
    "department": "Communication and Media",
    "telephone": "518-276-8264",
    "fax": "518-276-4092",
    "office": "4403 Russell Sage Laboratory (SAGE)",
    "mailstop": "SA Sage Bldg",
    "mailing": "Miles A Kimball\nSA Sage Bldg\nRensselaer Polytechnic Institute\n110 8th Street\nTroy, NY 12180",
    "homepage": "http://www.rpi.edu/~kimbam2"
  },
  {
    "rcs": "president",
    "type": "Faculty and Staff",
    "fname": "Shirley Ann",
    "lname": "Jackson",
    "title": "President",
    "department": "President's Office",
    "telephone": "518-276-6211",
    "fax": "518-276-8702",
    "office": "3031 Troy Building (TROY)",
    "mailstop": "Tr 3rd Fl",
    "mailing": "Shirley Ann Jackson\nTr 3rd Fl\nRensselaer Polytechnic Institute\n110 8th Street\nTroy, NY 12180",
    "homepage": "http://www.rpi.edu/web/President/index.html"
  },
  {
    "type": "Organization",
    "name": "Communication and Media",
    "abbreviation": "LL&C",
    "fax": "518-276-4092",
    "hompeage": "http://www.cm.rpi.edu/",
    "office": "Russell Sage Laboratory",
    "super": "School of Humanities, Arts, and Social Sciences",
    "subs": [
      "Writing Center"
    ],
    "staff": [
      "bennett",
      "deeryj",
      "dentzs",
      "esroce",
      "gricer"
    ],
    "admin": [
      "coppee",
      "osburk",
      "mooree3"
    ],
    "head": "kimbam2"
  }
]

function getDir() {
  return dir;
}
