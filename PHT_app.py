import numpy as np
from flask import Flask, request, jsonify, render_template, redirect, url_for
import pickle
from urllib.parse import urlencode
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense
#import webbrowser
app = Flask(__name__)

# loading models
normalized = pickle.load(open('Normalizing.pkl', 'rb'))
nn_model= pickle.load(open('PHTmodel.pkl', 'rb'))
url = 'http://personalhealthtracker.jeevanjyothihall.in/Modules/Prediction/predict.php'
@app.route('/')
def home():
    return redirect(url)    

@app.route('/predict',methods=['POST'])
def predict():
    '''
    For rendering results on HTML GUI
    '''
    # FOR loop to retrieve values from the form
    input_data = np.empty([0,])
    for value in request.form.values():
        input_data = np.append(input_data, float(value))    
    mean = normalized['mean']
    std = normalized['std']
    normalized_input_data = (input_data - mean) / std
    predictions = nn_model.predict(normalized_input_data)
    # Set threshold for binary classification
    threshold = 0.5
    binary_predictions = (predictions > threshold).astype(int)
    # Print the binary prediction   
    output = binary_predictions[0,0]
    #return output   
    # redirect_url = 'http://localhost:8080/Ratan/prediction/predict.php?output=' + str(output)    
    redirect_url = url + "?output=" + str(output)    

    return redirect(redirect_url) 

if __name__ == "__main__":
    app.run(debug=True,host='0.0.0.0')
