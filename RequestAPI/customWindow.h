void runCustom(GtkWidget *button, gpointer user_data) {

    GtkWidget *fenetre = GTK_WIDGET(user_data);

    GtkWidget *formulaire = gtk_bin_get_child(GTK_BIN(fenetre));

    GtkWidget *urlEntry = gtk_grid_get_child_at(GTK_GRID(formulaire), 1, 0);

    // GtkWidget *methodEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 1);

    GtkWidget *apiKeyEntry = gtk_grid_get_child_at(GTK_GRID(formulaire), 1, 2);

    GtkWidget *param1name = gtk_grid_get_child_at(GTK_GRID(formulaire), 1, 4);
    GtkWidget *param1value = gtk_grid_get_child_at(GTK_GRID(formulaire), 2, 4);

    GtkWidget *param2name = gtk_grid_get_child_at(GTK_GRID(formulaire), 1, 5);
    GtkWidget *param2value = gtk_grid_get_child_at(GTK_GRID(formulaire), 2, 5);

    GtkWidget *param3name = gtk_grid_get_child_at(GTK_GRID(formulaire), 1, 6);
    GtkWidget *param3value = gtk_grid_get_child_at(GTK_GRID(formulaire), 2, 6);

    GtkWidget *scrolledView = gtk_grid_get_child_at(GTK_GRID(formulaire), 1, 8);

    GtkWidget *textView = gtk_bin_get_child(GTK_BIN(scrolledView));

    const char *url = gtk_entry_get_text(GTK_ENTRY(urlEntry));
    // const char *method = gtk_combo_box_text_get_active_text(GTK_COMBO_BOX_TEXT(methodEntry));
    const char *apiKey = gtk_entry_get_text(GTK_ENTRY(apiKeyEntry));

    const char *param1 = gtk_entry_get_text(GTK_ENTRY(param1name));
    const char *param1Val = gtk_entry_get_text(GTK_ENTRY(param1value));

    const char *param2 = gtk_entry_get_text(GTK_ENTRY(param2name));
    const char *param2Val = gtk_entry_get_text(GTK_ENTRY(param2value));

    const char *param3 = gtk_entry_get_text(GTK_ENTRY(param3name));
    const char *param3Val = gtk_entry_get_text(GTK_ENTRY(param3value));

    if (strcmp(url,"") == 0 || strcmp(apiKey, "") == 0)
    {
        printf("URL or API Key are required\n");
    }
    else
    {
        char *fullUrl = (char *) malloc(1000 * sizeof(char));
        strcpy(fullUrl, url);
        strcat(fullUrl, "?apiKey=");
        strcat(fullUrl, apiKey);
        if (strcmp(param1, "") != 0 && strcmp(param1Val, "") != 0) 
        {
            strcat(fullUrl, "&");
            strcat(fullUrl, param1);
            strcat(fullUrl, "=");
            strcat(fullUrl, param1Val);
        }
        if (strcmp(param2, "") != 0 && strcmp(param2Val, "") != 0) 
        {
            strcat(fullUrl, "&");
            strcat(fullUrl, param2);
            strcat(fullUrl, "=");
            strcat(fullUrl, param2Val);
        }
        if (strcmp(param3, "") != 0 && strcmp(param3Val, "") != 0) 
        {
            strcat(fullUrl, "&");
            strcat(fullUrl, param3);
            strcat(fullUrl, "=");
            strcat(fullUrl, param3Val);
        }

        char nomFichier[] = "output.txt";
        runApi(fullUrl, nomFichier);
        
        formatToJson(nomFichier, "outputJson.txt");


        // Load the file into the text view
        GtkTextBuffer *buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(textView));
        gtk_text_buffer_set_text(buffer, "", -1);

        FILE *fp;
        char line[1000];
        fp = fopen("outputJson.txt", "r");
        if (fp == NULL) 
        {
            printf("Error opening file\n");
            exit(1);
        }
        while (fgets(line, sizeof(line), fp)) 
        {
            if (g_utf8_validate(line, -1, NULL)) 
            {
                gtk_text_buffer_insert_at_cursor(buffer, line, -1);
            }
            else 
            {
                gtk_text_buffer_insert_at_cursor(buffer, "{\n", -1);
            }
        }

        fclose(fp);
        
        // Free memory and delete files
        remove("outputJson.txt");
        remove("output.txt");
        free(fullUrl);

    }
}


void startCustomWindow(GtkWidget *button, gpointer user_data)
{
    
    GtkWidget *fenetre = gtk_window_new(GTK_WINDOW_TOPLEVEL);

    gtk_window_set_title(GTK_WINDOW(fenetre), "Custom");
    gtk_window_set_default_size(GTK_WINDOW(fenetre), 1000, 700);
    gtk_container_set_border_width(GTK_CONTAINER(fenetre), 10);

    GtkWidget *formulaire = gtk_grid_new();

    GtkWidget *url = gtk_label_new("URL :");
    GtkWidget *urlEntry = gtk_entry_new();

    gtk_grid_attach(GTK_GRID(formulaire), url, 0, 0, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), urlEntry, 1, 0, 1, 1);

    // GtkWidget *method = gtk_label_new("Method :");
    // GtkWidget *methodEntry = gtk_combo_box_text_new();

    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "GET");
    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "POST");
    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "PUT");
    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "DELETE");

    // gtk_combo_box_set_active(GTK_COMBO_BOX(methodEntry), 0);

    // gtk_grid_attach(GTK_GRID(form), method, 0, 1, 1, 1);
    // gtk_grid_attach(GTK_GRID(form), methodEntry, 1, 1, 1, 1);

    GtkWidget *apiKey = gtk_label_new("API Key :");
    GtkWidget *apiKeyEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(formulaire), apiKey, 0, 2, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), apiKeyEntry, 1, 2, 1, 1);


    GtkWidget *parameters = gtk_label_new("Parameters :");
    gtk_grid_attach(GTK_GRID(formulaire), parameters, 0, 3, 1, 1);
    gtk_widget_set_margin_top(parameters, 10);
    gtk_widget_set_margin_bottom(parameters, 10);

    GtkWidget *name = gtk_label_new("Name :");
    gtk_grid_attach(GTK_GRID(formulaire), name, 1, 3, 1, 1);
    gtk_widget_set_margin_top(name, 10);
    gtk_widget_set_margin_bottom(name, 10);

    GtkWidget *value = gtk_label_new("Value :");
    gtk_grid_attach(GTK_GRID(formulaire), value, 2, 3, 1, 1);
    gtk_widget_set_margin_top(value, 10);
    gtk_widget_set_margin_bottom(value, 10);
    

    
    GtkWidget *param1 = gtk_label_new("Parameter 1 :");
    GtkWidget *param1name = gtk_entry_new();
    GtkWidget *param1Entry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(formulaire), param1, 0, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), param1name, 1, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), param1Entry, 2, 4, 1, 1);

    GtkWidget *param2 = gtk_label_new("Parameter 2 :");
    GtkWidget *param2name = gtk_entry_new();
    GtkWidget *param2Entry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(formulaire), param2, 0, 5, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), param2name, 1, 5, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), param2Entry, 2, 5, 1, 1);

    GtkWidget *param3 = gtk_label_new("Parameter 3 :");
    GtkWidget *param3name = gtk_entry_new();
    GtkWidget *param3Entry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(formulaire), param3, 0, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), param3name, 1, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(formulaire), param3Entry, 2, 6, 1, 1);


    GtkWidget *validation = gtk_button_new_with_label("Submit");
    g_signal_connect(validation, "clicked", G_CALLBACK(runCustom), fenetre);
    gtk_grid_attach(GTK_GRID(formulaire), validation, 1, 7, 2, 1);


    GtkWidget *textView = gtk_text_view_new();
    gtk_text_view_set_editable(GTK_TEXT_VIEW(textView), FALSE);


    GtkWidget *scrolledWindow = gtk_scrolled_window_new(NULL, NULL);

    gtk_container_add(GTK_CONTAINER(scrolledWindow), textView);
    gtk_scrolled_window_set_min_content_height(GTK_SCROLLED_WINDOW(scrolledWindow), 300);
    gtk_scrolled_window_set_min_content_width(GTK_SCROLLED_WINDOW(scrolledWindow), 800);
    gtk_grid_attach(GTK_GRID(formulaire), scrolledWindow, 1, 8, 2, 1);


    gtk_widget_set_halign(formulaire, GTK_ALIGN_CENTER);
    gtk_widget_set_valign(formulaire, GTK_ALIGN_CENTER);

    gtk_container_add(GTK_CONTAINER(fenetre), formulaire);
    
    gtk_widget_show_all(fenetre);
}