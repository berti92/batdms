<div data-role="panel" data-position="left" data-display="overlay" id="panel_overview">
  <ul data-role="listview">
    <li data-role="list-divider">Menu</li>
    <li data-icon="false"><a href="index.php">Startseite</a></li>
    <li data-icon="false"><a href="conversations.php">Nachrichten</a></li>
    <li data-icon="false"><a href="user.php?id=<?php echo($user_id); ?>">Mein Profil</a></li>
    <li data-icon="false"><a href="user_groups.php?id=<?php echo($user_id); ?>">Meine Gruppen</a></li>
    <li data-icon="false"><a href="user_events.php?id=<?php echo($user_id); ?>">Meine Events</a></li>
    <li data-icon="false"><a href="user_friendships.php?id=<?php echo($user_id); ?>">Meine Freunde</a></li>
    <li data-icon="false"><a href="group_create.php">Gruppe erstellen</a></li>
    <li data-icon="false"><a href="event_create.php">Event erstellen</a></li>
    <li data-icon="false"><a href="search.php?group=true">Gruppe suchen</a></li>
    <li data-icon="false"><a href="search.php?group=false">Benutzer suchen</a></li>
    <li data-icon="false"><a href="impressum.php">Über Grapp</a></li>
    <li data-icon="false"><a href="logout.php">Abmelden</a></li>
  </ul>
</div>
