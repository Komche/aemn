<?php
        //Pour la connexion à la base de donnée
        $this->config["host"] = 'localhost';
        $this->config["db_name"] = 'aemn';
        $this->config["username"] = 'root';
        $this->config["password_"] = '';
$this->config["tables"] = ['annonce','article','bureau','files','folder','hadith','roles','type_article','users',];

$this->config['tables']['annonce'] = ['id','titre','date','heure','h_annonce',];

$this->config['tables']['annonce']['id'] = ['id'];

$this->config['tables']['article'] = ['id_article','user','type','category','title','content','url','statut','dates','likes','lieu','date_evenement',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];

$this->config['tables']['bureau'] = ['id_bureau','nom_bureau','logo','statut','date_ajout',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];

$this->config['tables']['files'] = ['id_files','label','path','size','type','folder','user',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];$this->config['tables']['files']['id'] = ['id_files'];

$this->config['tables']['folder'] = ['id_folder','label','path','type','user',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];$this->config['tables']['files']['id'] = ['id_files'];$this->config['tables']['folder']['id'] = ['id_folder'];

$this->config['tables']['hadith'] = ['id','titre','hadith','rapporteur','h_img',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];$this->config['tables']['files']['id'] = ['id_files'];$this->config['tables']['folder']['id'] = ['id_folder'];$this->config['tables']['hadith']['id'] = ['id'];

$this->config['tables']['roles'] = ['id_roles','types','read_role','write_role','user',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];$this->config['tables']['files']['id'] = ['id_files'];$this->config['tables']['folder']['id'] = ['id_folder'];$this->config['tables']['hadith']['id'] = ['id'];$this->config['tables']['roles']['id'] = ['id_roles'];

$this->config['tables']['type_article'] = ['id_type_article','label','statut','date_ajout_type','date_sup_type',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];$this->config['tables']['files']['id'] = ['id_files'];$this->config['tables']['folder']['id'] = ['id_folder'];$this->config['tables']['hadith']['id'] = ['id'];$this->config['tables']['roles']['id'] = ['id_roles'];$this->config['tables']['type_article']['id'] = ['id_type_article'];

$this->config['tables']['users'] = ['id_user','last_name','first_name','email','phone_number','bureau','password_user','code',];

$this->config['tables']['annonce']['id'] = ['id'];$this->config['tables']['article']['id'] = ['id_article'];$this->config['tables']['bureau']['id'] = ['id_bureau'];$this->config['tables']['files']['id'] = ['id_files'];$this->config['tables']['folder']['id'] = ['id_folder'];$this->config['tables']['hadith']['id'] = ['id'];$this->config['tables']['roles']['id'] = ['id_roles'];$this->config['tables']['type_article']['id'] = ['id_type_article'];$this->config['tables']['users']['id'] = ['id_user'];
