SeekQuarry/Yioop --
Open Source Pure PHP Search Engine, Crawler, and Indexer

Copyright (C) 2009 - 2019  Chris Pollett chris@pollett.org

http://www.seekquarry.com/

LICENSE:

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

Summary
-------
The Yioop search engine consists of three main
scripts:

src/executables/Fetcher.php - used to download batches of urls provided
    the queue_server.
src/executables/QueueServer.php - maintains a queue of urls that are
    going to be scheduled to be seen. It also keeps
    track of what has been seen and robots.txt info.
    Its last responsibility is to create the index_archive
    that is used by the search front end.

index.php -- a search engine web page. It is also used
    to handle message passing between the fetchers
    (multiple machines can act as fetchers) and the
    QueueServer.

Download
--------
You can download the SeekQuarry search engine from
http://www.seekquarry.com/

Requirements
------------
The Yioop search engine requires PHP 5.6.

Credits
------
The source code is mainly due to Chris Pollett.
Other contributors include: Mangesh Dahale, Ravi Dhillon, Priya Gangaraju,
Akshat Kukreti, Pooja Mishra, Sreenidhi Pundi Muralidharan,
Nakul Natu, Shailesh Padave, Vijaya Pamidi, Snigdha Parvatneni,
Akash Patel, Vijeth Patil, Mallika Perepa, Tarun Pepira,
Eswara Rajesh Pinapala, Tamayee Potluri, Shawn Tice, Pushkar Umaranikar,
Sandhya Vissapragada. Several people helped with localization:
My wife, Mary Pollett, Jonathan Ben-David, Ismail.B, Andrea Brunetti,
Thanh Bui, Sujata Dongre, Animesh Dutta, Aida Khosroshahi, Radha Kotipalli,
Youn Kim, Akshat Kukreti, Chao-Hsin Shih, Ahmed Kamel Taha, and Sugi Widjaja.

Installation
-------------
Please see the INSTALL file

Documentation and Support
-------------------------
Please check out seekquarry.com
