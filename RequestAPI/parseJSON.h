void formatToJson(char* fichier, char* sortie){

    // Ouvrir le fichier json
    FILE *fichierJson;
    fichierJson = fopen(fichier, "r");
    if (fichierJson == NULL) {
        printf("Error opening fichier\n");
        exit(1);
    }

    // Lire le fichier json et stocker son contenu 
    char * json = (char *) malloc(100000 * sizeof(char));
    char line[1000];
    while (fgets(line, sizeof(line), fichierJson))
    {
        strcat(json, line);
    }

    fclose(fichierJson);

    int retrait = 0;
    int longueur = strlen(json);
    int i = 0;
    int nouvelleLigne = 1;
    char *parsed = (char *) malloc(100000 * sizeof(char));
    parsed[0] = '\0';
    while (i < longueur)
    {
        char character = json[i];

        if (character == '{' || character == '[')
        {
            strncat(parsed, &character, 1);
            strcat(parsed, "\n");
            retrait++;
            nouvelleLigne = 1;
            for (int j = 0; j < retrait; j++)
            {
                strcat(parsed, "    ");
            }
        } else if (character == '}' || character == ']')
        {
            strcat(parsed, "\n");
            retrait--;
            for (int j = 0; j < retrait; j++)
            {
                strcat(parsed, "    ");
            }
            strncat(parsed, &character, 1);
            nouvelleLigne = 1;
        } else if (character == ',') {
            strcat(parsed, "\n");
            nouvelleLigne = 1;
            for (int j = 0; j < retrait; j++)
            {
                strcat(parsed, "    ");
            }
        } else
        {
            if (nouvelleLigne)
            {
                for (int j = 0; j < retrait; j++)
                {
                    strcat(parsed, "    ");
                }
                nouvelleLigne = 0;
            }
            strncat(parsed, &character, 1);
        }

        i++;
    }
    strcat(parsed, "\n");
    
    // Ecrire le fichier json formaté
    
    FILE *fichierSortie;
    fichierSortie = fopen(sortie, "w");
    fprintf(fichierSortie, "%s", parsed);
    fclose(fichierSortie);
    free(parsed);
    free(json);
}