<?php
mb_internal_encoding('UTF-8');

interface CollaborativeInterface
{
	/** Rajoute l'id d'un collaborateur à la collaboration
	**/
	public function addCollaborator($colaId);
	
	/** Retire un collaborateur de la collaboration
	** arg : id (string) du collaborateur à retirer ou son index (integer) dans la collaboration
	**  Renvoie l'id du collaborateur retiré
	** Attention retirer un collaborateur peut changer l'indexage numérique des collaborateurs
	**/
	public function removeCollaborator($arg);
	
	/** Renvoie l'id d'un collaborateur sur base de son id ou index
	**/
	public function getCollaborator($arg);
	
	/** Renvoie une copie de la liste des collaborateurs
	**/
	public function getCollaboratorsList();
}
?>