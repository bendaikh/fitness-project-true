<?php

namespace App\Enums;

enum UserStatus: string
{
    case ACTIVE = 'active';
    case DEACTIVE = 'deactive';
    case BANNED = 'yes';
    case UNBANNED = 'no';
}
